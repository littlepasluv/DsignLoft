


        // Use the centralized Firebase configuration
        firebase.initializeApp(window.firebaseConfig);

        // --- 1. MAIN INITIALIZATION FUNCTION ---
        async function initializeDashboard(user) {
            console.log("Initializing dashboard for user:", user.uid);
            
            // Set the "Edit Brief" button link
            const editBriefBtn = document.getElementById("editBriefBtn");
            if (editBriefBtn) {
                editBriefBtn.href = `index.html?mode=edit&uid=${user.uid}`;
            }

            // Update user info in header
            updateUserInfo(user);
            
            // Fetch and display the brief
            const briefData = await fetchAndDisplayBrief(user.uid);
            
            // Display payment information if brief exists
            if (briefData) {
                displayPaymentInfo(briefData);
            }
            
            // Hide loading overlay
            document.getElementById("loading-overlay").style.display = "none";
        }

        // --- 2. DATA FETCHING FUNCTIONS ---
        
        // This function gets the data from your API and displays it
        async function fetchAndDisplayBrief(uid) {
            try {
                console.log("Fetching brief for UID:", uid);
                const response = await fetch(`api/get_brief.php?uid=${uid}`);
                console.log("Response status:", response.status);
                
                if (!response.ok) {
                    displayNoBrief();
                    return null;
                }

                const briefData = await response.json();
                console.log("Brief data received:", briefData);

                // Update project title
                document.getElementById("projectTitle").textContent = `${briefData.projectOptions?.title || "Creative Brief"}`;

                // Render the full brief using the new comprehensive function
                updateBriefDisplay(briefData);
                
                return briefData;

            } catch (error) {
                displayErrorMessage();
                console.error("Error fetching brief data:", error);
                return null;
            }
        }

        function displayNoBrief() {
            document.getElementById("brief-tab").innerHTML = "<h2>No Creative Brief Found</h2><p>You have not created a creative brief yet. <a href=\"index.html\">Click here to create one.</a></p>";
        }

        function displayErrorMessage() {
            document.getElementById("brief-tab").innerHTML = "<h2>Error</h2><p>An error occurred while loading your brief. Please try again later.</p>";
        }

        // --- 3. HELPER FUNCTIONS ---

        // This function updates the user\'s name and initial in the header.
        function updateUserInfo(user) {
            if (!user) return;
            
            const displayName = user.displayName || user.email || "User";
            const profilePhotoEl = document.getElementById("headerProfilePhoto");
            
            document.getElementById("headerUserName").textContent = displayName;
            
            if (user.photoURL && user.photoURL.trim() !== "") {
                profilePhotoEl.innerHTML = `<img src="${user.photoURL}" alt="Profile Photo" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;" onerror="this.style.display=\'none\'; this.parentElement.textContent=\'${generateInitials(displayName)}\';">`;
            } else {
                const initials = generateInitials(displayName);
                profilePhotoEl.textContent = initials;
            }
        }

        function generateInitials(name) {
            if (!name) return "U";
            const parts = name.split(/\s@+/);
            return parts.length > 1 ? (parts[0][0] + parts[1][0]).toUpperCase() : name.substring(0, 2).toUpperCase();
        }

        /**
         * This is the comprehensive function to update the brief display.
         * It reads the complete data structure from the fetched brief.
         */
        function updateBriefDisplay(briefData) {
            // Helper function to safely get nested properties from the brief object.
            const safeGet = (obj, path, defaultValue = "Not specified") => {
                const value = path.split(".").reduce((current, key) => (current && current[key] !== undefined && current[key] !== null) ? current[key] : undefined, obj);
                return value !== undefined ? value : defaultValue;
            };

            // --- A. Left Column: General Information & Project Options ---

            // 1. Package Details
            const packageDetails = { bronze: { name: "bronze", price: "$299", color: "#CD7F32" }, silver: { name: "silver", price: "$599", color: "#C0C0C0" }, gold: { name: "gold", price: "$1,299", color: "#f1B80B" }, platinum: { name: "platinum", price: "$2,199", color: "#E5E4E2" }, website: { name: "website", price: "$2,899", color: "#53AB81" } };
            const currentPackageKey = safeGet(briefData, "selectedPackage", "");
            const currentPackage = packageDetails[currentPackageKey] || { name: currentPackageKey, price: "N/A", color: "#333" };
            const packageEl = document.getElementById("brief-package");
            if (packageEl && currentPackageKey) {
                packageEl.innerHTML = `<span class="package-name-box" style="background-color: ${currentPackage.color}; color: ${currentPackageKey === "platinum" ? "#333" : "white"};">${currentPackage.name}</span> <span class="package-price-box">${currentPackage.price}</span>`;
            } else if (packageEl) {
                packageEl.textContent = "Not specified";
            }

            // 2. Project Title
            document.getElementById("brief-project-title").textContent = safeGet(briefData, "projectOptions.title");
            
            // 3. Conditional Durations, Guaranteed, NDA, and Print Options
            const serviceType = safeGet(briefData, "briefDetails.serviceType", "");
            
            const guaranteedContainer = document.getElementById("brief-guaranteed-container");
            guaranteedContainer.style.display = safeGet(briefData, "projectOptions.guaranteed", false) ? "block" : "none";
            if (guaranteedContainer.style.display === "block") document.getElementById("brief-guaranteed").innerHTML = "<span class=\"guaranteed-nda-tag\">GUARANTEED</span>";

            const ndaContainer = document.getElementById("brief-nda-container");
            ndaContainer.style.display = safeGet(briefData, "projectOptions.nda", false) ? "block" : "none";
            if (ndaContainer.style.display === "block") document.getElementById("brief-nda").innerHTML = "<span class=\"guaranteed-nda-tag\">NDA</span>";

            const durationWebsiteContainer = document.getElementById("brief-project-duration-website-container");
            if (["Website", "Landing Page", "Other", "Web Design Only"].includes(serviceType)) {
                durationWebsiteContainer.style.display = "block";
                document.getElementById("brief-project-duration-website").textContent = safeGet(briefData, "projectOptions.websiteDuration");
            } else { durationWebsiteContainer.style.display = "none"; }
            
            const durationContainer = document.getElementById("brief-project-duration-container");
            if (currentPackageKey && !["Website", "Landing Page", "Other", "Web Design Only"].includes(serviceType)) {
                durationContainer.style.display = "block";
                document.getElementById("brief-project-duration").textContent = safeGet(briefData, "projectOptions.projectDuration", "7") + " days";
            } else { durationContainer.style.display = "none"; }

            const printContainer = document.getElementById("brief-print-options-container");
            if (safeGet(briefData, "businessCardPrinting.enabled", false)) {
                printContainer.style.display = "block";
                const printOpts = safeGet(briefData, "businessCardPrinting.options", []);
                const printQty = safeGet(briefData, "businessCardPrinting.quantity", 0);
                document.getElementById("brief-print-options").innerHTML = `<ul>${printOpts.map(o => `<li>${o}</li>`).join("")}<li>Quantity: ${printQty}</li></ul><br>Free shipping — $18.99`;
            } else {
                printContainer.style.display = "none";
            }
            
            // 4. Language
            document.getElementById("brief-language").value = safeGet(briefData, "briefDetails.language", "English");
            
            // --- B. Right Column: Brief Details ---

            // 5. Background Info
            document.getElementById("brief-brand-name").textContent = safeGet(briefData, "briefDetails.brandName");
            document.getElementById("brief-slogan").textContent = safeGet(briefData, "briefDetails.slogan");
            document.getElementById("brief-description").textContent = safeGet(briefData, "briefDetails.description");
            document.getElementById("brief-industry").textContent = safeGet(briefData, "briefDetails.industry");
            document.getElementById("brief-notes").textContent = safeGet(briefData, "briefDetails.notes", "No specific notes provided");

            // 6. Visual Style (Calls helper functions)
            updateColorDisplay(safeGet(briefData, "selectedColors", []));
            updateStyleAttributes(safeGet(briefData, "brandStyles", {}));
            
            // 7. Design Inspiration (Calls helper function)
            updateDesignInspiration(safeGet(briefData, "selectedLogos", []));
            
            // 8. Deliverables & Final Files (Calls helper functions)
            updateDeliverables(document.getElementById("brief-deliverables"), serviceType);
            updateFilesDeliverables(document.getElementById("brief-files-deliverables"), serviceType);
            updateFinalFiles(document.getElementById("brief-final-files"), serviceType);
        }

        // --- HELPER FUNCTIONS FOR \'updateBriefDisplay\' ---

        function updateColorDisplay(selectedColors = []) {
            const colorsEl = document.getElementById("brief-colors");
            if (!colorsEl) return;
            if (!selectedColors || selectedColors.length === 0) {
                colorsEl.innerHTML = "<p>No colors specified</p>";
                return;
            }
            colorsEl.innerHTML = selectedColors.map(colorObj => {
                const style = colorObj.color === "custom" 
                    ? `background-color: ${colorObj.name};`
                    : (colorObj.src ? `background-image: url(${colorObj.src}); background-size: cover; background-position: center;` : `background-color: #ccc;`);
                return `<div class="brief-color-box" style="${style}"></div>`;
            }).join("");
        }

        function updateStyleAttributes(brandStyles = {}) {
            const styleEl = document.getElementById("brief-style-attributes");
            if (!styleEl) return;
            const styleLabels = { classicToModern: ["Classic", "Modern"], matureToYouthful: ["Mature", "Youthful"], feminineToMasculine: ["Feminine", "Masculine"], playfulToSophisticated: ["Playful", "Sophisticated"], economicalToLuxurious: ["Economical", "Luxurious"], geometricToOrganic: ["Geometric", "Organic"], abstractToLiteral: ["Abstract", "Literal"] };
            const content = Object.entries(brandStyles).map(([key, value]) => {
                const [left, right] = styleLabels[key] || [key, key];
                return `<div class="brief-style-slider"><span class="brief-style-left-label">${left}</span><div class="brief-style-slider-track"><div class="brief-style-slider-thumb" style="left: ${value}%"></div></div><span class="brief-style-right-label">${right}</span></div>`;
            }).join("");
            styleEl.innerHTML = content || "<p>No style attributes specified</p>";
        }

        function updateDesignInspiration(selectedLogos = []) {
            const inspirationEl = document.getElementById("brief-design-inspiration");
            if (!inspirationEl) return;
            if (!selectedLogos || selectedLogos.length === 0) {
                inspirationEl.innerHTML = "<p>No design inspiration selected</p>";
                return;
            }
            inspirationEl.innerHTML = selectedLogos.map(src => `<div class="brief-inspiration-item"><div class="brief-inspiration-image"><img src="${src}" alt="Inspiration" style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px;"></div></div>`).join("");
        }
        
        function getDeliverables(serviceType) {
            switch(serviceType) {
                case "Logo only": case "Logo Only": return ["Logo in AI and SVG format", "Typography", "Color palette"];
                case "Logo & Brand Identity Pack": case "Logo & Brand Identity Pack (most popular)": return ["Logo in AI and SVG format", "Typography", "Color palette", "Brand guidelines"];
                case "Website": return ["Complete website design", "Responsive layout", "Source code", "SEO optimization"];
                case "Landing Page": return ["Landing page design", "Responsive layout", "Source code"];
                case "Web Design Only": return ["Complete website mockup", "UI/UX Design recommendations"];
                default: return ["Deliverables as per custom agreement"];
            }
        }
    
        function getFilesDeliverables(serviceType) {
            switch(serviceType) {
                case "bronze": case "Logo only": case "Logo Only": return [{ icon: "📋", name: "1x Logo" }];
                case "Logo & Brand Identity Pack": case "Logo & Brand Identity Pack (most popular)": return [{ icon: "📋", name: "1x Logo" }, { icon: "💼", name: "1x Business card" }, { icon: "📄", name: "1x Letterhead" }, { icon: "📘", name: "1x Envelope" }, { icon: "📱", name: "1x Facebook cover" }];
                case "Website": case "Landing Page": case "Web Design Only": return [{ icon: "🎨", name: "1x Web design (pages as needed)" }, { icon: "📦", name: "1x Website package" }];
                default: return [{ icon: "📁", name: "Custom files as per agreement" }];
            }
        }
    
        function getFinalFiles(serviceType) {
            const screenQuality = ["PNG", "JPG", "GIF", "PDF"];
            const layeredSources = (["Website", "Landing Page"].includes(serviceType)) ? ["AI", "PSD", "FIGMA", "Source code ZIP"] : ["AI", "PSD"];
            return { layeredSources, screenQuality };
        }

        function updateDeliverables(element, serviceType) {
            if(!element) return;
            const items = getDeliverables(serviceType);
            element.innerHTML = items.map(item => `<div class="deliverable-item">${item}</div>`).join("");
        }

        function updateFilesDeliverables(element, serviceType) {
            if(!element) return;
            const items = getFilesDeliverables(serviceType);
            element.innerHTML = items.map(item => `<div class="brief-deliverable-row"><div class="brief-deliverable-icon">${item.icon}</div><div class="brief-deliverable-info"><div class="brief-deliverable-name">${item.name}</div><div class="brief-deliverable-actions"><span class="brief-deliverable-status">📋 Design guidelines</span></div></div></div>`).join("");
        }
    
        function updateFinalFiles(element, serviceType) {
            if(!element) return;
            const { layeredSources, screenQuality } = getFinalFiles(serviceType);
            element.innerHTML = `<div class="brief-field"><label class="brief-label">Layered sources</label><div class="brief-file-options">${layeredSources.map(source => `<span class="brief-file-option">${source}</span>`).join("")}</div></div><div class="brief-field"><label class="brief-label">Screen quality</label><div class="brief-file-options">${screenQuality.map(quality => `<span class="brief-file-option">${quality}</span>`).join("")}</div></div>`;
        }

        function displayPaymentInfo(briefData) {
            if (!briefData || !briefData.selectedPackage) return;
            const packagePrices = { bronze: 299, silver: 599, gold: 1299, platinum: 2199, website: 2899 };
            const basePrice = packagePrices[briefData.selectedPackage] || 0;
            let total = basePrice;
            let invoiceItemsHTML = "";
            const packageNames = { bronze: "Bronze Package", silver: "Silver Package", gold: "Gold Package", platinum: "Platinum Package", website: "Website Package" };
            const packageName = packageNames[briefData.selectedPackage] || briefData.selectedPackage;
            invoiceItemsHTML += `<div class="invoice-item"><div>${packageName}</div><div class="invoice-column-amount">$${basePrice.toFixed(2)}</div></div>`;
            if (briefData.businessCardPrinting && briefData.businessCardPrinting.enabled) {
                const printCost = (briefData.businessCardPrinting.quantity || 0) * 0.50;
                if (printCost > 0) {
                    invoiceItemsHTML += `<div class="invoice-item"><div>Business Card Printing (${briefData.businessCardPrinting.quantity} units)</div><div class="invoice-column-amount">$${printCost.toFixed(2)}</div></div>`;
                    total += printCost;
                }
                invoiceItemsHTML += `<div class="invoice-item"><div>Free Shipping</div><div class="invoice-column-amount">$0.00</div></div>`;
            }
            document.getElementById("invoice-items").innerHTML = invoiceItemsHTML;
            document.getElementById("invoice-total").textContent = `$${total.toFixed(2)}`;
            document.getElementById("payment-total").textContent = `$${total.toFixed(2)}`;
            document.getElementById("payment-secured").textContent = `$${total.toFixed(2)}`;
        }

        function switchTab(tabName) {
            document.querySelectorAll(".nav-tab").forEach(tab => tab.classList.remove("active"));
            document.querySelectorAll(".tab-content").forEach(content => content.classList.remove("active"));
            document.querySelector(`.nav-tab[onclick="switchTab(\'${tabName}\')"]`).classList.add("active");
            
            if (tabName === "payment") {
                document.getElementById("payment-tab-content").classList.add("active");
            } else {
                document.getElementById(`${tabName}-tab`).classList.add("active");
            }
        }

        function toggleUserDropdown() {
            document.getElementById("userDropdown").classList.toggle("show");
        }

        async function signOut() {
            if (confirm("Are you sure you want to sign out?")) {
                await firebase.auth().signOut();
                window.location.href = "login.html";
            }
        }

        // --- Authentication state listener ---
        firebase.auth().onAuthStateChanged(user => {
            console.log("Auth state changed:", user ? user.uid : "No user");
            if (user && user.emailVerified) {
                // If the user is logged in and verified, initialize the dashboard
                initializeDashboard(user);
            } else {
                // If not, send them back to the login page
                window.location.href = "login.html";
            }
        });





