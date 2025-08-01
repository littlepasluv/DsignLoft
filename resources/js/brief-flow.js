    // Enhanced Application State
    const appState = {
      currentSection: 1,
      isEditMode: false,
      totalSections: 6,
      selectedLogos: [],
      brandStyles: {
        classicToModern: 50,
        matureToYouthful: 50,
        feminineToMasculine: 50,
        playfulToSophisticated: 50,
        economicalToLuxurious: 50,
        geometricToOrganic: 50,
        abstractToLiteral: 50
      },
      selectedColors: [],
      customColor: "",
      briefDetails: {
        briefId: null,
        email: "",
        language: "English",
        brandName: "",
        slogan: "",
        description: "",
        industry: "",
        serviceType: "",
        notes: ""
      },
      serviceRequirements: {
        pageCount: "",
        websiteType: "",
        features: [],
        landingGoal: "",
        callToAction: "",
        designType: "",
        designStyle: ""
      },
      selectedPackage: null,
      projectOptions: {
        title: "",
        guaranteed: false,
        nda: false,
        projectDuration: "7",
        websiteDuration: "2-4 weeks",
      },
      businessCardPrinting: {
          enabled: false,
          options: [],
          quantity: 250
      }
    };
    
    // Use the centralized Firebase configuration
    firebase.initializeApp(window.firebaseConfig);
    const auth = firebase.auth();

    // DOM Elements
    const sections = document.querySelectorAll(".section");
    const steps = document.querySelectorAll(".step");
    const progressFill = document.querySelector(".progress-fill");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const currentStepSpan = document.getElementById("currentStep");

    // Initialize
    document.addEventListener("DOMContentLoaded", async () => {
        // SET THE EDIT MODE STATE FIRST
        const urlParams = new URLSearchParams(window.location.search);
        appState.isEditMode = urlParams.get("mode") === "edit";

        initializeEventListeners();
        await loadSavedData(); 
        
        auth.onAuthStateChanged(user => {
            const finalButton = document.getElementById("proceedToLogin");
            if (user && user.emailVerified) {
                finalButton.textContent = "Save Changes & Return";
                finalButton.onclick = () => saveChangesAndReturn(user.uid);
            } else {
                finalButton.textContent = "Proceed to Create Account";
                finalButton.onclick = () => proceedToSignup();
            }
        });

        // Use the appState to check for edit mode now
        if (appState.isEditMode) {
            const loginButton = document.getElementById("headerLoginBtn");
            if (loginButton) {
                loginButton.style.display = "none";
            }
        }
    });
    
    function proceedToSignup() {
        validateAndSaveForm();
        localStorage.setItem("creativeBriefData", JSON.stringify(appState));
        const briefId = appState.briefDetails.briefId || "";
        window.location.href = `signup.html?email=${encodeURIComponent(appState.briefDetails.email)}&briefId=${briefId}`;
    }

    function initializeEventListeners() {
      // Logo selection
      document.querySelectorAll("#logo-container .selectable").forEach(item => {
        item.addEventListener("click", () => handleLogoSelection(item));
      });

      // Color selection
      document.querySelectorAll("#color-container .selectable").forEach(item => {
        item.addEventListener("click", () => handleColorSelection(item));
      });

      // Style sliders
      for (let i = 1; i <= 7; i++) {
        document.getElementById(`style${i}`)?.addEventListener("input", updateBrandStyles);
      }

      // Package selection
      document.querySelectorAll(".package-select").forEach(btn => {
        btn.addEventListener("click", (e) => {
          const packageType = e.target.closest(".package").dataset.package;
          selectPackage(packageType);
        });
      });

      // Service type radio buttons
      document.querySelectorAll("input[name='serviceType']").forEach(radio => {
        radio.addEventListener("change", handleServiceTypeChange);
      });

      // Print options checkbox
      document.getElementById("printCard")?.addEventListener("change", togglePrintFields);

      // Navigation
      prevBtn.addEventListener("click", goToPreviousSection);
      nextBtn.addEventListener("click", goToNextSection);

      // Form inputs blur event
      const formInputs = ["email", "brandName", "description", "projectTitle", "slogan", "notes"];
      formInputs.forEach(id => {
        document.getElementById(id)?.addEventListener("blur", validateAndSaveForm);
      });
      const formSelects = ["language", "industry", "duration", "websiteDuration", "printSided", "paperStock", "cornerStyle"];
      formSelects.forEach(id => {
        document.getElementById(id)?.addEventListener("change", validateAndSaveForm);
      });

      // Custom color input
      document.getElementById("customColorInput")?.addEventListener("blur", handleCustomColor);

      // Summary actions
      document.getElementById("proceedToLogin")?.addEventListener("click", proceedToLogin);
      document.getElementById("editSelections")?.addEventListener("click", () => goToSection(1));
      document.getElementById("exportPDF")?.addEventListener("click", exportToPDF);

      // File upload
      document.getElementById("ndaFile")?.addEventListener("change", handleFileUpload);
    }

    function handleServiceTypeChange() {
      const selectedService = document.querySelector("input[name='serviceType']:checked")?.value;
      const websiteDurationContainer = document.getElementById("websiteDurationContainer");
      const durationContainer = document.getElementById("duration").parentElement; // The form-group
      
      const websiteFields = document.getElementById("websiteFields");
      const landingPageFields = document.getElementById("landingPageFields");
      const webDesignFields = document.getElementById("webDesignFields");
      
      // Hide all conditional fields first
      websiteFields.classList.remove("show");
      landingPageFields.classList.remove("show");
      webDesignFields.classList.remove("show");
      
      if (!selectedService || !websiteDurationContainer || !durationContainer) return;

      const servicesThatHideWebsiteDuration = ["Logo Only", "Logo & Brand Identity Pack"];
      const servicesThatShowWebsiteDuration = ["Website", "Landing Page", "Other", "Web Design Only"];

      if (servicesThatHideWebsiteDuration.includes(selectedService)) {
        websiteDurationContainer.style.display = "none";
        durationContainer.style.display = "block";
      } else if (servicesThatShowWebsiteDuration.includes(selectedService)) {
        websiteDurationContainer.style.display = "block";
        durationContainer.style.display = "none";
      }

      // Show the correct conditional fields based on service type
      if (selectedService === "Website") websiteFields.classList.add("show");
      if (selectedService === "Landing Page") landingPageFields.classList.add("show");
      if (selectedService === "Web Design Only") webDesignFields.classList.add("show");
    }

    function togglePrintFields() {
      const printFields = document.getElementById("printFields");
      const printCheckbox = document.getElementById("printCard");
      printFields.classList.toggle("show", printCheckbox.checked);
    }

    function handleFileUpload(e) {
      const file = e.target.files[0];
      const label = e.target.nextElementSibling;
      if (file) {
        label.textContent = file.name;
        label.style.color = "#53AB81";
      } else {
        label.textContent = "Click to upload or drag and drop";
        label.style.color = "#666";
      }
    }

    function handleLogoSelection(item) {
        const src = item.dataset.src;
        const isSelected = item.classList.contains("selected");

        if (isSelected) {
            item.classList.remove("selected");
            appState.selectedLogos = appState.selectedLogos.filter(logo => logo !== src);
        } else if (appState.selectedLogos.length < 3) {
            item.classList.add("selected");
            appState.selectedLogos.push(src);
        } else {
            alert("You can only select up to 3 logos. Please deselect one first to make a change.");
        }
        updateLogoCount();
    }

    function handleColorSelection(item) {
      const color = item.dataset.color;
      const src = item.dataset.src;
      const isSelected = item.classList.contains("selected");
      
      if (isSelected) {
        item.classList.remove("selected");
        appState.selectedColors = appState.selectedColors.filter(c => c.color !== color);
      } else if (appState.selectedColors.length < 3) {
        item.classList.add("selected");
        appState.selectedColors.push({ color, src, name: color }); // Add name property
      } else {
        alert("You can only select up to 3 colors.");
      }
      updateColorCount();
    }

    function handleCustomColor() {
      const input = document.getElementById("customColorInput");
      const value = input.value.trim();
      
      // Remove any previous custom color to avoid duplicates
      appState.selectedColors = appState.selectedColors.filter(c => c.color !== "custom");

      if (value) {
        if (appState.selectedColors.length < 3) {
          appState.selectedColors.push({ color: "custom", name: value, src: null });
        } else {
            alert("You have already selected 3 colors. Please deselect one to add a custom color.");
            input.value = ""; // Clear input if limit is reached
        }
      }
      appState.customColor = value;
      updateColorCount();
    }

    function updateBrandStyles() {
      appState.brandStyles = {
        classicToModern: parseInt(document.getElementById("style1").value),
        matureToYouthful: parseInt(document.getElementById("style2").value),
        feminineToMasculine: parseInt(document.getElementById("style3").value),
        playfulToSophisticated: parseInt(document.getElementById("style4").value),
        economicalToLuxurious: parseInt(document.getElementById("style5").value),
        geometricToOrganic: parseInt(document.getElementById("style6").value),
        abstractToLiteral: parseInt(document.getElementById("style7").value)
      };
    }

    function selectPackage(packageType) {
      document.querySelectorAll(".package").forEach(pkg => {
        pkg.classList.remove("selected");
        pkg.style.borderColor = pkg.classList.contains("recommended") ? "#ffb400" : "#e0e0e0";
      });

      const selectedPackage = document.querySelector(`[data-package="${packageType}"]`);
      selectedPackage.classList.add("selected");
      selectedPackage.style.borderColor = "#53AB81";
      appState.selectedPackage = packageType;
      validateAndSaveForm();
    }

    function validateAndSaveForm() {
      appState.briefDetails = {
        email: document.getElementById("email")?.value || "",
        language: document.getElementById("language")?.value || "English",
        brandName: document.getElementById("brandName")?.value || "",
        slogan: document.getElementById("slogan")?.value || "",
        description: document.getElementById("description")?.value || "",
        industry: document.getElementById("industry")?.value || "",
        serviceType: document.querySelector("input[name='serviceType']:checked")?.value || "",
        notes: document.getElementById("notes")?.value || ""
      };

      const serviceType = appState.briefDetails.serviceType;
      if (serviceType === "Website") {
        appState.serviceRequirements = {
          pageCount: document.getElementById("pageCount")?.value || "",
          websiteType: document.getElementById("websiteType")?.value || "",
          features: Array.from(document.querySelectorAll("input[name='features']:checked")).map(cb => cb.value)
        };
      } else if (serviceType === "Landing Page") {
        appState.serviceRequirements = {
          landingGoal: document.getElementById("landingGoal")?.value || "",
          callToAction: document.getElementById("callToAction")?.value || ""
        };
      } else if (serviceType === "Web Design Only") {
        appState.serviceRequirements = {
          designType: document.getElementById("designType")?.value || "",
          designStyle: document.getElementById("designStyle")?.value || ""
        };
      } else {
        appState.serviceRequirements = {};
      }

      appState.projectOptions = {
        title: document.getElementById("projectTitle")?.value || "",
        guaranteed: document.getElementById("guaranteed")?.checked || false,
        nda: document.getElementById("nda")?.checked || false,
        projectDuration: document.getElementById("duration")?.value || "7",
        websiteDuration: document.getElementById("websiteDuration")?.value || "2-4 weeks",
      };
      
      appState.businessCardPrinting = {
          enabled: document.getElementById("printCard")?.checked || false,
          options: [
              document.getElementById("printSided")?.value || "single",
              document.getElementById("paperStock")?.value || "matte",
              document.getElementById("cornerStyle")?.value || "square",
          ],
          quantity: parseInt(document.getElementById("quantity")?.value) || 250
      };


      return validateRequiredFields();
    }

    function validateRequiredFields() {
      const required = ["email", "brandName", "description"];
      const basicValid = required.every(field => appState.briefDetails[field]?.trim());
      
      if (appState.currentSection >= 5) {
        return basicValid && appState.projectOptions.title?.trim();
      }
      return basicValid;
    }

    function updateLogoCount() {
      const count = appState.selectedLogos.length;
      const countEl = document.getElementById("logo-count");
      if (countEl) {
        countEl.textContent = `${count} of 3 logos selected`;
        countEl.classList.toggle("complete", count === 3);
      }
    }

    function updateColorCount() {
      const count = appState.selectedColors.length;
      const countEl = document.getElementById("color-count");
      if (countEl) {
        countEl.textContent = `${count} of ${appState.selectedColors.some(c=>c.color === "custom") ? 4 : 3} colors selected`;
        countEl.classList.toggle("complete", count > 0);
      }
    }

    function goToSection(sectionNumber) {
      if (sectionNumber < 1 || sectionNumber > appState.totalSections) return;
      
      document.querySelectorAll(".section").forEach(section => section.classList.remove("active"));
      const targetSection = document.getElementById(`section-${sectionNumber}`);
      if (targetSection) {
        targetSection.classList.add("active", "fade-in");
        setTimeout(() => targetSection.classList.remove("fade-in"), 500);
      }
      
      appState.currentSection = sectionNumber;
      updateProgress();
      updateNavigation();
      
      if (sectionNumber === 6) {
        updateSummary();
      }
    }

    function goToNextSection() {
      if (!validateCurrentSection()) return;
      if (appState.currentSection < appState.totalSections) {
        goToSection(appState.currentSection + 1);
      }
    }

    function goToPreviousSection() {
      if (appState.currentSection > 1) {
        goToSection(appState.currentSection - 1);
      }
    }

    function validateCurrentSection() {
        // This is the new, more direct approach. It checks the URL every time.
        const urlParams = new URLSearchParams(window.location.search);
        const isEditMode = urlParams.get("mode") === "edit";

        switch (appState.currentSection) {
            case 1:
                // If the URL clearly shows "mode=edit", we will always allow you to proceed.
                if (isEditMode) {
                    return true;
                }
                
                // This rule now only applies to NEW users who are NOT in edit mode.
                if (appState.selectedLogos.length !== 3) {
                    alert("Please select exactly 3 logos to continue.");
                    return false;
                }
                break;

            case 4:
                validateAndSaveForm();
                if (!validateRequiredFields()) {
                    alert("Please fill in all required fields (Email, Brand Name, Description).");
                    return false;
                }
                break;
            case 5:
                validateAndSaveForm();
                if (!appState.selectedPackage) {
                    alert("Please select a package to continue.");
                }
                if (!appState.projectOptions.title?.trim()) {
                    alert("Please enter a project title.");
                    return false;
                }
                break;
        }
        return true; // All other steps are valid by default
    }

    function updateProgress() {
      const progressPercentage = ((appState.currentSection - 1) / (appState.totalSections - 1)) * 100;
      progressFill.style.width = `${progressPercentage}%`;
      
      steps.forEach((step, index) => {
        const stepNumber = index + 1;
        step.classList.remove("active", "completed");
        if (stepNumber === appState.currentSection) step.classList.add("active");
        else if (stepNumber < appState.currentSection) step.classList.add("completed");
      });
    }

    function updateNavigation() {
      currentStepSpan.textContent = `Step ${appState.currentSection} of ${appState.totalSections}`;
      prevBtn.style.display = appState.currentSection > 1 ? "inline-block" : "none";
      nextBtn.style.display = appState.currentSection === appState.totalSections ? "none" : "inline-block";
      nextBtn.textContent = appState.currentSection === appState.totalSections - 1 ? "Review →" : "Next →";
    }

    function updateSummary() {
        validateAndSaveForm(); // Ensure appState is current
        const safeGet = (obj, path, defaultValue = "Not specified") => path.split(".").reduce((current, key) => current && current[key], obj) || defaultValue;

        // --- Left Column ---
        document.getElementById("brief-project-title").textContent = safeGet(appState, "projectOptions.title");
        const packageEl = document.getElementById("brief-package");
        if (appState.selectedPackage) {
            const packageDetails = { bronze: { name: "bronze", price: "$299", color: "#CD7F32" }, silver: { name: "silver", price: "$599", color: "#C0C0C0" }, gold: { name: "gold", price: "$1,299", color: "#f1B80B" }, platinum: { name: "platinum", price: "$2,199", color: "#E5E4E2" }, website: { name: "website", price: "$2,899", color: "#53AB81" } };
            const currentPackage = packageDetails[appState.selectedPackage] || { name: appState.selectedPackage, price: "N/A", color: "#333" };
            packageEl.innerHTML = `<span class="package-name-box" style="background-color: ${currentPackage.color}; color: ${appState.selectedPackage === "platinum" ? "#333" : "white"};">${currentPackage.name}</span> <span class="package-price-box">${currentPackage.price}</span>`;
        } else {
            packageEl.textContent = "Not specified";
        }
        
        const projectDurationWebsiteContainer = document.getElementById("brief-project-duration-website-container");
        const serviceType = safeGet(appState, "briefDetails.serviceType");
        if ([ "Website", "Landing Page", "Other", "Web Design Only"].includes(serviceType)) {
            document.getElementById("brief-project-duration-website").textContent = safeGet(appState, "projectOptions.websiteDuration");
            projectDurationWebsiteContainer.style.display = "block";
        } else {
            projectDurationWebsiteContainer.style.display = "none";
        }
        
        const projectDurationContainer = document.getElementById("brief-project-duration-container");
        if ([ "bronze", "silver", "gold", "platinum"].includes(appState.selectedPackage) && !["Website", "Landing Page", "Other", "Web Design Only"].includes(serviceType)) {
            document.getElementById("brief-project-duration").textContent = safeGet(appState, "projectOptions.projectDuration") + " days";
            projectDurationContainer.style.display = "block";
        } else {
            projectDurationContainer.style.display = "none";
        }
        
        const guaranteedContainer = document.getElementById("brief-guaranteed-container");
        if (safeGet(appState, "projectOptions.guaranteed")) {
            document.getElementById("brief-guaranteed").innerHTML = "<span class='guaranteed-nda-tag'>GUARANTEED</span>";
            guaranteedContainer.style.display = "block";
        } else { guaranteedContainer.style.display = "none"; }
        
        const ndaContainer = document.getElementById("brief-nda-container");
        if (safeGet(appState, "projectOptions.nda")) {
            document.getElementById("brief-nda").innerHTML = "<span class='guaranteed-nda-tag'>NDA</span>";
            ndaContainer.style.display = "block";
        } else { ndaContainer.style.display = "none"; }

        const printContainer = document.getElementById("brief-print-options-container");
        if (safeGet(appState, "businessCardPrinting.enabled")) {
            let printDetails = `<ul>${appState.businessCardPrinting.options.map(o => `<li>${o}</li>`).join("")}<li>Quantity: ${appState.businessCardPrinting.quantity}</li></ul><br>Free shipping — $18.99`;
            document.getElementById("brief-print-options").innerHTML = printDetails;
            printContainer.style.display = "block";
        } else {
            printContainer.style.display = "none";
        }
        
        document.getElementById("brief-language").value = safeGet(appState, "briefDetails.language", "English");
        
        // --- Right Column ---
        document.getElementById("brief-brand-name").textContent = safeGet(appState, "briefDetails.brandName");
        document.getElementById("brief-slogan").textContent = safeGet(appState, "briefDetails.slogan");
        document.getElementById("brief-description").textContent = safeGet(appState, "briefDetails.description");
        document.getElementById("brief-industry").textContent = safeGet(appState, "briefDetails.industry");
        document.getElementById("brief-notes").textContent = safeGet(appState, "briefDetails.notes", "No specific notes provided");

        updateSummaryUIDisplay("brief-colors", appState.selectedColors, (item) => `<div class="brief-color-box" style="background-image: url(${item.src}); background-size: cover; background-position: center; background-color: ${item.color === "custom" ? item.name : ""};"></div>`, "No colors selected");
        updateSummaryUIDisplay("brief-style-attributes", Object.entries(appState.brandStyles), ([key, value]) => {
            const labels = { classicToModern: ["Classic", "Modern"], matureToYouthful: ["Mature", "Youthful"], feminineToMasculine: ["Feminine", "Masculine"], playfulToSophisticated: ["Playful", "Sophisticated"], economicalToLuxurious: ["Economical", "Luxurious"], geometricToOrganic: ["Geometric", "Organic"], abstractToLiteral: ["Abstract", "Literal"] };
            const [left, right] = labels[key];
            return `<div class="brief-style-slider"><span class="brief-style-left-label">${left}</span><div class="brief-style-slider-track"><div class="brief-style-slider-thumb" style="left: ${value}%"></div></div><span class="brief-style-right-label">${right}</span></div>`;
        }, "No style attributes specified");
        updateSummaryUIDisplay("brief-design-inspiration", appState.selectedLogos, (src) => `<div class="brief-inspiration-item"><div class="brief-inspiration-image"><img src="${src}" alt="Inspiration" style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px;"></div></div>`, "No design inspiration selected");
        
        updateDeliverables(document.getElementById("brief-deliverables"), serviceType);
        updateFilesDeliverables(document.getElementById("brief-files-deliverables"), serviceType);
        updateFinalFiles(document.getElementById("brief-final-files"), serviceType);
    }
    
    function updateSummaryUIDisplay(elementId, data, renderer, emptyMessage) {
        const el = document.getElementById(elementId);
        if (!el) return;
        if (data && data.length > 0) {
            el.innerHTML = data.map(renderer).join("");
        } else {
            el.innerHTML = `<p>${emptyMessage}</p>`;
        }
    }

    function getDeliverables(serviceType) {
        switch(serviceType) {
            case "Logo only": case "Logo Only": return ["Logo in AI and SVG format", "Typography", "Color palette"];
            case "silver": case "gold": case "Logo & Brand Identity Pack (most popular)" : case "Logo & Brand Identity Pack": return ["Logo in AI and SVG format", "Typography", "Color palette", "Brand guidelines"];
            case "website": case "Website": return ["Complete website design", "Responsive layout", "Source code", "SEO optimization"];
            default: return ["Logo in AI and SVG format", "Typography", "Color palette"];
        }
    }
    
    function getFilesDeliverables(serviceType) {
        switch(serviceType) {
            case "bronze": case "Logo only": case "Logo Only": return [{ icon: "📋", name: "1x Logo" }];
            case "silver": case "gold": case "Logo & Brand Identity Pack (most popular)" : case "Logo & Brand Identity Pack": return [{ icon: "📋", name: "1x Logo" }, { icon: "💼", name: "1x Business card" }, { icon: "📄", name: "1x Letterhead" }, { icon: "📘", name: "1x Envelope" }, { icon: "📱", name: "1x Facebook cover" }];
            case "website": case "Website": return [{ icon: "🎨", name: "1x Web design (pages as needed)" }, { icon: "📦", name: "1x Website package" }];
            default: return [{ icon: "📋", name: "1x Logo" }];
        }
    }
    
    function getFinalFiles(serviceType) {
        const screenQuality = ["PNG", "JPG", "GIF", "PDF"];
        const layeredSources = (serviceType === "website" || serviceType === "Website") ? ["AI", "PSD", "FIGMA", "Source code ZIP"] : ["AI", "PSD"];
        return { layeredSources, screenQuality };
    }

    function updateDeliverables(element, serviceType) {
        const items = getDeliverables(serviceType);
        element.innerHTML = items.map(item => `<div class="deliverable-item">${item}</div>`).join("");
    }

    function updateFilesDeliverables(element, serviceType) {
        const items = getFilesDeliverables(serviceType);
        element.innerHTML = items.map(item => `<div class="brief-deliverable-row"><div class="brief-deliverable-icon">${item.icon}</div><div class="brief-deliverable-info"><div class="brief-deliverable-name">${item.name}</div><div class="brief-deliverable-status">📋 Design guidelines</div></div></div>`).join("");
    }
    
    function updateFinalFiles(element, serviceType) {
        const { layeredSources, screenQuality } = getFinalFiles(serviceType);
        element.innerHTML = `<div class="brief-field"><label class="brief-label">LAYERED SOURCES</label><div class="brief-file-options">${layeredSources.map(source => `<span class="brief-file-option">${source}</span>`).join("")}</div></div><div class="brief-field"><label class="brief-label">SCREEN QUALITY</label><div class="brief-file-options">${screenQuality.map(quality => `<span class="brief-file-option">${quality}</span>`).join("")}</div></div>`;
    }

    async function saveChangesAndReturn(uid) {
        if (!uid) { alert("Error: User ID not found."); return; }
        validateAndSaveForm(); // Final capture of all data
        alert("Saving your changes...");
        try {
            const response = await fetch("api/save_brief.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ firebase_uid: uid, brief: appState })
            });
            if (response.ok) {
                alert("Changes saved successfully!");
                window.location.href = "dashboard.html";
            } else {
                const errorResult = await response.json();
                alert(`Error: ${errorResult.message}`);
            }
        } catch (error) {
            console.error("Failed to save changes:", error);
            alert("A network error occurred.");
        }
    }

    function proceedToSignup() {
      // First, ensure the latest form data is in our appState object
      validateAndSaveForm(); 
      
      // Save the complete brief data to localStorage. The signup page will retrieve it from there.
      localStorage.setItem("creativeBriefData", JSON.stringify(appState));
      
      // Get the email from the form to pre-fill the signup page
      const email = document.getElementById("email").value;
      
      alert("Brief saved! Please complete your registration to continue.");
      window.location.href = `signup.html?email=${encodeURIComponent(email)}`;
    }

    function exportToPDF() {
      const briefContent = document.getElementById("section-6").cloneNode(true);
      briefContent.querySelectorAll("button").forEach(button => button.remove());
      const printWindow = window.open("", "_blank");
      printWindow.document.write(`<!DOCTYPE html><html><head><title>DsignLoft Creative Brief</title><link rel="stylesheet" href="style.css"></head><body>${briefContent.innerHTML}</body></html>`);
      printWindow.document.close();
      setTimeout(() => { printWindow.print(); printWindow.close(); }, 500);
    }
    
    async function loadSavedData() {
      const urlParams = new URLSearchParams(window.location.search);
      const uid = urlParams.get("uid");
      let data = null;

      // We use appState.isEditMode, which was already set when the page loaded.
      if (appState.isEditMode && uid) {
          try {
              const response = await fetch(`api/get_brief.php?uid=${uid}`);
              if (response.ok) {
                  const result = await response.json();
                  data = result.data;
              } else {
                console.error("Failed to fetch brief for edit mode. Status:", response.status);
                // Show a more user-friendly message instead of a generic alert
                showEditModeError("Could not load your saved brief. You may continue creating a new brief or try again later.");
                return; // Stop if we can't load the data
            }
        } catch (error) {
            console.error("Error fetching brief:", error);
            // Handle network/server errors gracefully
            showEditModeError("Server is currently unavailable. You may continue creating a new brief.");
            return;
        }
    } else {
        const savedData = localStorage.getItem("creativeBriefData");
        if (savedData) {
            try {
                data = JSON.parse(savedData);
            } catch(e) {
                console.error("Could not parse saved data from localStorage", e);
            }
        }
    }

    if (data) {
        const correctEditModeStatus = appState.isEditMode;
        Object.assign(appState, data);
        appState.isEditMode = correctEditModeStatus;
        restoreUIState();
    }
}

// New function to display user-friendly error messages
function showEditModeError(message) {
    const errorContainer = document.createElement("div");
    errorContainer.style.cssText = `
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffe0b2; /* Light orange */
        color: #e65100; /* Dark orange */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        z-index: 10000;
        text-align: center;
        font-size: 16px;
        border: 1px solid #ff9800;
    `;
    errorContainer.innerHTML = `
        <p><strong>Error:</strong> ${message}</p>
        <button onclick="this.parentNode.remove()" style="
            margin-top: 15px;
            padding: 8px 15px;
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        ">Dismiss</button>
    `;
    document.body.appendChild(errorContainer);
}


    function restoreUIState() {

}