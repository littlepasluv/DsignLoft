@extends('layouts.app')

@section('title', 'DsignLoft - Creative Brief Flow')

@section('content')
<div class="header">
<div class="header-content">
<a href="https://dsignloft.com/get-a-design" target="_blank">
<img alt="DsignLoft" class="header-logo" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo_dsignloft-Y4LxQ4REjXhxO2a5.svg"/>
</a>
<a class="header-login" href="{{ url("login") }}" id="headerLoginBtn">Login</a>
</div>
</div>
<div class="progress-container">
<div class="progress-bar">
<div class="progress-steps">
<div class="step active" data-step="1">
<div class="step-number">1</div>
<span>Logo Selection</span>
</div>
<div class="step" data-step="2">
<div class="step-number">2</div>
<span>Brand Style</span>
</div>
<div class="step" data-step="3">
<div class="step-number">3</div>
<span>Colors</span>
</div>
<div class="step" data-step="4">
<div class="step-number">4</div>
<span>Brief Details</span>
</div>
<div class="step" data-step="5">
<div class="step-number">5</div>
<span>Package</span>
</div>
<div class="step" data-step="6">
<div class="step-number">6</div>
<span>Summary</span>
</div>
</div>
<div class="progress-line">
<div class="progress-fill"></div>
</div>
</div>
</div>
<div class="main-content">
<div class="container">
<div class="section active fade-in" id="section-1">
<h1>Select Your Brand Style</h1>
<h2>1. Choose Your Favorite Logos (Pick 3)</h2>
<div class="selection-count" id="logo-count">0 of 3 logos selected</div>
<div class="image-grid" id="logo-container">
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo-YKb3yRraylh8w0J6.png">
<img alt="Logo 1" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo-YKb3yRraylh8w0J6.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/designkanjute-portfolio-prio-A85EKnyQrbTPjwKO.png">
<img alt="Logo 2" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/designkanjute-portfolio-prio-A85EKnyQrbTPjwKO.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/cocolatos-emas-m7V3R3P7xbco63z7.png">
<img alt="Logo 3" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/cocolatos-emas-m7V3R3P7xbco63z7.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/a-mxBX9VDarrsRRR1o.png">
<img alt="Logo 4" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/a-mxBX9VDarrsRRR1o.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/vs-mp8JNp2ZL1hxOkq0.png">
<img alt="Logo 5" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/vs-mp8JNp2ZL1hxOkq0.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/5-mp8JNp2q0gsjM6kE.png">
<img alt="Logo 6" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/5-mp8JNp2q0gsjM6kE.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo-mP4MLE86REcoxBpD.png">
<img alt="Logo 7" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo-mP4MLE86REcoxBpD.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo-Yyv0LpWPWGSLzWpP.png">
<img alt="Logo 8" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo-Yyv0LpWPWGSLzWpP.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/77-Yyv0Lp6pxziXOzo5.png">
<img alt="Logo 9" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/77-Yyv0Lp6pxziXOzo5.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/zero-in-development-logo-dWxOVWKaRzsp0207.png">
<img alt="Logo 10" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/zero-in-development-logo-dWxOVWKaRzsp0207.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/10x-founders-AR03zvXwP9s5R37E.png">
<img alt="Logo 11" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/10x-founders-AR03zvXwP9s5R37E.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/exquisite-moon-m2WEkzJKB0i9NaMw.png">
<img alt="Logo 12" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/exquisite-moon-m2WEkzJKB0i9NaMw.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/primalogo-AMq8w45EaoFjWW3w.png">
<img alt="Logo 12" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/primalogo-AMq8w45EaoFjWW3w.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/a-Yg2yXl05aJhKoZVa.png">
<img alt="Logo 12" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/a-Yg2yXl05aJhKoZVa.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/d-YanJZBPGM5fXvy6K.png">
<img alt="Logo 12" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/d-YanJZBPGM5fXvy6K.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo-gold-rgb-YX4xLPRJ5jSv81XO.png">
<img alt="Logo 12" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo-gold-rgb-YX4xLPRJ5jSv81XO.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/thengwe-YBgbxPoPQKsVaVXN.png">
<img alt="Logo 12" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/thengwe-YBgbxPoPQKsVaVXN.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/a-YBg7kzjLB5hV8WQ4.png">
<img alt="Logo 12" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/a-YBg7kzjLB5hV8WQ4.png"/>
<div class="checkmark">✓</div>
</div>
</div>
</div>
<div class="section fade-in" id="section-2">
<h1>Define Your Brand Style</h1>
<h2>2. Adjust the sliders to match your brand personality</h2>
<div class="style-section">
<div class="style-item">
<div class="label-row">
<span>Classic</span>
<span>Modern</span>
</div>
<input id="style1" max="100" min="0" type="range" value="50"/>
</div>
<div class="style-item">
<div class="label-row">
<span>Mature</span>
<span>Youthful</span>
</div>
<input id="style2" max="100" min="0" type="range" value="50"/>
</div>
<div class="style-item">
<div class="label-row">
<span>Feminine</span>
<span>Masculine</span>
</div>
<input id="style3" max="100" min="0" type="range" value="50"/>
</div>
<div class="style-item">
<div class="label-row">
<span>Playful</span>
<span>Sophisticated</span>
</div>
<input id="style4" max="100" min="0" type="range" value="50"/>
</div>
<div class="style-item">
<div class="label-row">
<span>Economical</span>
<span>Luxurious</span>
</div>
<input id="style5" max="100" min="0" type="range" value="50"/>
</div>
<div class="style-item">
<div class="label-row">
<span>Geometric</span>
<span>Organic</span>
</div>
<input id="style6" max="100" min="0" type="range" value="50"/>
</div>
<div class="style-item">
<div class="label-row">
<span>Abstract</span>
<span>Literal</span>
</div>
<input id="style7" max="100" min="0" type="range" value="50"/>
</div>
</div>
</div>
<div class="section fade-in" id="section-3">
<h1>Choose Your Colors</h1>
<h2>3. Select your preferred color palette (Pick up to 3)</h2>
<div class="selection-count" id="color-count">0 of 3 colors selected</div>
<div class="image-grid" id="color-container">
<div class="selectable" data-color="yellow" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/yellow-8bf27a5c-mnlJkRL2N0cqj94X.png">
<img alt="Yellow" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/yellow-8bf27a5c-mnlJkRL2N0cqj94X.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-color="red" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/red-d750f2a1-Aq2JXRE13phMzPL5.png">
<img alt="Red" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/red-d750f2a1-Aq2JXRE13phMzPL5.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-color="purple" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/purple-e7723e2e-mePJaRMOlVU50OlV.png">
<img alt="Purple" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/purple-e7723e2e-mePJaRMOlVU50OlV.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-color="pink" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/pink-01853e5c-mjEGDnB8l3uV6MRN.png">
<img alt="Pink" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/pink-01853e5c-mjEGDnB8l3uV6MRN.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-color="orange" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/orange-8f167965-Y4LvgerlaOcr6OyJ.png">
<img alt="Orange" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/orange-8f167965-Y4LvgerlaOcr6OyJ.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-color="light" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/light-4fc3a041-m6Lb1BRqBOibJqqW.png">
<img alt="Light" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/light-4fc3a041-m6Lb1BRqBOibJqqW.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-color="green" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/green-24a49099-mxBX9RWEg0tKjJkE.png">
<img alt="Green" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/green-24a49099-mxBX9RWEg0tKjJkE.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-color="dark" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/dark-6976a991-Aq2JXREZ2JF2b7Ly.png">
<img alt="Dark" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/dark-6976a991-Aq2JXREZ2JF2b7Ly.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-color="blue" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/blue-ddc0e5cf-YZ9jpRGWG6C8BD81.png">
<img alt="Blue" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/blue-ddc0e5cf-YZ9jpRGWG6C8BD81.png"/>
<div class="checkmark">✓</div>
</div>
<div class="selectable" data-color="aqua" data-src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/aqua-2ad270cb-Aq2JXRE14yiqxrEy.png">
<img alt="Aqua" src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/aqua-2ad270cb-Aq2JXRE14yiqxrEy.png"/>
<div class="checkmark">✓</div>
</div>
</div>
<div class="custom-color-section">
<h3>Or enter a custom color:</h3>
<div class="form-group">
<input id="customColorInput" placeholder="e.g., #123abc or navy" type="text"/>
</div>
</div>
</div>
<div class="section fade-in" id="section-4">
<h1>Creative Brief</h1>
<h2>4. Tell us about your project</h2>
<div class="form-group">
<label for="email">Email *</label>
<input id="email" placeholder="john@example.com" required="" type="email"/>
</div>
<div class="form-group">
<label for="language">Language</label>
<select id="language">
<option value="English">English (Recommended)</option>
<option value="Spanish">Spanish</option>
<option value="French">French</option>
<option value="German">German</option>
<option value="Other">Other</option>
</select>
</div>
<div class="form-group">
<label for="brandName">What name do you want in your logo? *</label>
<input id="brandName" placeholder="e.g. Acme" required="" type="text"/>
</div>
<div class="form-group">
<label for="slogan">Do you have a slogan?</label>
<input id="slogan" placeholder="Optional" type="text"/>
</div>
<div class="form-group">
<label for="description">Describe what your organization or product does *</label>
<textarea id="description" placeholder="E.g. We sell anvils to manufacturers..." required="" rows="4"></textarea>
</div>
<div class="form-group">
<label for="industry">Select your industry</label>
<select id="industry">
<option value="">- Select industry -</option>
<option value="Technology">Technology</option>
<option value="Fashion">Fashion</option>
<option value="Education">Education</option>
<option value="Nonprofit">Nonprofit</option>
<option value="Health &amp; Wellness">Health &amp; Wellness</option>
<option value="Other">Other</option>
</select>
</div>
<div class="form-group">
<label>What type of design service do you need?</label>
<div class="radio-group">
<label>
<input checked="" name="serviceType" type="radio" value="Logo Only"/>
              Logo only
            </label>
<label>
<input name="serviceType" type="radio" value="Web Design Only"/>
              Web Design only
            </label>
<label>
<input name="serviceType" type="radio" value="Website"/>
              Website
            </label>
<label>
<input name="serviceType" type="radio" value="Landing Page"/>
              Landing Page
            </label>
<label>
<input name="serviceType" type="radio" value="Logo &amp; Brand Identity Pack"/>
              Logo &amp; Brand Identity Pack (most popular)
            </label>
<label>
<input name="serviceType" type="radio" value="Other"/>
              Other
            </label>
</div>
</div>
<div class="conditional-fields" id="websiteFields">
<h4>Website Requirements</h4>
<div class="form-group">
<label for="pageCount">How many pages do you need?</label>
<select id="pageCount">
<option value="1-5">1-5 pages</option>
<option value="6-10">6-10 pages</option>
<option value="11-20">11-20 pages</option>
<option value="21+">21+ pages</option>
</select>
</div>
<div class="form-group">
<label for="websiteType">What type of website?</label>
<select id="websiteType">
<option value="Business/Corporate">Business/Corporate</option>
<option value="E-commerce">E-commerce</option>
<option value="Portfolio">Portfolio</option>
<option value="Blog">Blog</option>
<option value="Non-profit">Non-profit</option>
<option value="Other">Other</option>
</select>
</div>
<div class="form-group">
<label for="features">Required features (check all that apply):</label>
<div class="checkbox-group">
<label><input name="features" type="checkbox" value="Contact Form"/> Contact Form</label>
<label><input name="features" type="checkbox" value="Online Store"/> Online Store</label>
<label><input name="features" type="checkbox" value="Blog"/> Blog</label>
<label><input name="features" type="checkbox" value="Gallery"/> Photo Gallery</label>
<label><input name="features" type="checkbox" value="Booking System"/> Booking System</label>
<label><input name="features" type="checkbox" value="User Accounts"/> User Accounts</label>
<label><input name="features" type="checkbox" value="Social Media Integration"/> Social Media Integration</label>
<label><input name="features" type="checkbox" value="SEO Optimization"/> SEO Optimization</label>
</div>
</div>
</div>
<div class="conditional-fields" id="landingPageFields">
<h4>Landing Page Requirements</h4>
<div class="form-group">
<label for="landingGoal">What is the main goal of your landing page?</label>
<select id="landingGoal">
<option value="Lead Generation">Lead Generation</option>
<option value="Product Sales">Product Sales</option>
<option value="Event Registration">Event Registration</option>
<option value="Newsletter Signup">Newsletter Signup</option>
<option value="App Download">App Download</option>
<option value="Other">Other</option>
</select>
</div>
<div class="form-group">
<label for="callToAction">What should be your main call-to-action?</label>
<input id="callToAction" placeholder="e.g., Sign Up Now, Buy Now, Learn More" type="text"/>
</div>
</div>
<div class="conditional-fields" id="webDesignFields">
<h4>Web Design Requirements</h4>
<div class="form-group">
<label for="designType">What type of design do you need?</label>
<select id="designType">
<option value="Homepage Design">Homepage Design</option>
<option value="Complete Website Mockup">Complete Website Mockup</option>
<option value="Mobile App Design">Mobile App Design</option>
<option value="UI/UX Design">UI/UX Design</option>
<option value="Other">Other</option>
</select>
</div>
<div class="form-group">
<label for="designStyle">Preferred design style:</label>
<select id="designStyle">
<option value="Modern/Minimalist">Modern/Minimalist</option>
<option value="Corporate/Professional">Corporate/Professional</option>
<option value="Creative/Artistic">Creative/Artistic</option>
<option value="Playful/Fun">Playful/Fun</option>
<option value="Elegant/Luxury">Elegant/Luxury</option>
<option value="Other">Other</option>
</select>
</div>
</div>
<div class="form-group">
<label for="notes">Anything else you'd like to share?</label>
<textarea id="notes" placeholder="Optional notes for designers..." rows="3"></textarea>
</div>
</div>
<div class="section fade-in" id="section-5">
<h1>Choose Your Package</h1>
<h2>5. Which design package do you want?</h2>
<p style="text-align: center; margin-bottom: 40px; color: #666;">
          All packages come with a 100% money-back guarantee and full copyright ownership.
        </p>
<div class="pricing-wrapper">
<div class="package" data-package="bronze">
<h3>Bronze</h3>
<div class="price">$299</div>
<ul class="features">
<li>Logo &amp; business card</li>
<li>Letterhead &amp; envelope</li>
<li>Facebook cover</li>
<li>Expect ~30 designs</li>
<li>Money back guarantee</li>
</ul>
<button class="btn btn-warning package-select">Select</button>
</div>
<div class="package" data-package="silver">
<h3>Silver</h3>
<div class="price">$599</div>
<ul class="features">
<li>Logo &amp; business card</li>
<li>Letterhead &amp; envelope</li>
<li>Facebook cover</li>
<li>Expect ~40 designs</li>
<li>Larger designer prize</li>
<li>Money back guarantee</li>
</ul>
<button class="btn btn-warning package-select">Select</button>
</div>
<div class="package recommended" data-package="gold">
<h3>Gold</h3>
<div class="price">$1,299</div>
<ul class="features">
<li>Logo &amp; business card</li>
<li>Letterhead &amp; envelope</li>
<li>Facebook cover</li>
<li>Expect ~50 designs</li>
<li>Larger designer prize</li>
<li>Mid and Top Level designers only</li>
<li>Money back guarantee</li>
</ul>
<button class="btn btn-warning package-select">Select</button>
</div>
<div class="package" data-package="platinum">
<h3>Platinum</h3>
<div class="price">$2,199</div>
<ul class="features">
<li>Everything in Gold</li>
<li>Expect ~60 designs</li>
<li>Top Level designers only</li>
<li>1-on-1 consultation</li>
<li>Priority support</li>
<li>Money back guarantee</li>
</ul>
<button class="btn btn-warning package-select">Select</button>
</div>
<div class="package" data-package="website">
<h3>Website</h3>
<div class="price">$2,899</div>
<ul class="features">
<li>Complete website design &amp; development</li>
<li>Up to 10 pages</li>
<li>Mobile responsive design</li>
<li>Contact forms &amp; basic SEO</li>
<li>Logo &amp; branding included</li>
<li>3 months support</li>
<li>Money back guarantee</li>
</ul>
<button class="btn btn-warning package-select">Select</button>
</div>
</div>
<div class="package-options">
<h3>Project Options</h3>
<div class="form-group">
<label for="projectTitle">Project title *</label>
<input id="projectTitle" placeholder="Write a descriptive project title to inspire more designers" required="" type="text"/>
</div>
<div class="form-group" id="websiteDurationContainer">  <label for="websiteDuration">Project Duration for Website</label>
    <select id="websiteDuration">
        <option value="2-4 weeks">2-4 Weeks (Landing Page)</option>
        <option value="4-8 weeks">4-8 Weeks (Multipages)</option>
        <option value="8-12 weeks">8-12 Weeks (E-Commerce)</option>
    </select>
</div>
<div class="checkbox-group">
<label>
<input id="guaranteed" name="projectOptions" type="checkbox" value="guaranteed"/>
              Guaranteed ($50.00) - More participation, no refund, 50% more designs
            </label>
<label>
<input id="nda" name="projectOptions" type="checkbox" value="nda"/>
              NDA - Keep project private, requires confidentiality agreement
            </label>
</div>
<div class="form-group">
<label for="ndaFile">Upload File (optional)</label>
<div class="file-upload">
<input accept=".pdf,.doc,.docx" id="ndaFile" type="file"/>
<div class="file-upload-label">Click to upload or drag and drop</div>
</div>
</div>
<div class="form-group">
<label for="duration">Project Duration</label>
<select id="duration">
<option value="7">Standard 7 days (Free)</option>
<option value="3">3 days (+$29)</option>
<option value="2">2 days (+$49)</option>
<option value="1">24 hours (+$69)</option>
</select>
</div>
<div class="form-group">
<h4>Print Options (Indonesia only)</h4>
<div class="checkbox-group">
<label>
<input id="printCard" name="printOptions" type="checkbox" value="businessCard"/>
                Print your business card
              </label>
</div>
</div>
<div class="conditional-fields" id="printFields">
<div class="form-group">
<label for="printSided">Printing options</label>
<select id="printSided">
<option value="single">Single-sided</option>
<option value="double">Double-sided</option>
</select>
</div>
<div class="form-group">
<label for="paperStock">Paper stock</label>
<select id="paperStock">
<option value="matte">Matte</option>
<option value="gloss">Gloss</option>
</select>
</div>
<div class="form-group">
<label for="cornerStyle">Corner style</label>
<select id="cornerStyle">
<option value="square">Square</option>
<option value="rounded">Rounded</option>
</select>
</div>
<div class="form-group">
<label for="quantity">Quantity</label>
<input id="quantity" max="5000" min="50" type="number" value="250"/>
<small style="color: #666; display: block; margin-top: 5px;">Free shipping — $18.99</small>
</div>
</div>
</div>
</div>
<div class="section fade-in" id="section-6">
<div class="brief-instruction-bar">
<span class="brief-instruction-text">
            You have 24 hours to complete your brief. Please wait for the project management dashboard to continue to the login process.
          </span>
</div>
<div class="brief-container">
<div class="brief-left-column">
    <div class="brief-section">
        <h3 class="brief-section-title">General information</h3>
        <div class="brief-field">
            <label class="brief-label">PROJECT TITLE</label>
            <div class="brief-value" id="brief-project-title"></div>
        </div>
        <div class="brief-field">
            <label class="brief-label">PACKAGE</label>
            <div class="brief-value package-display" id="brief-package"></div>
        </div>
        <div class="brief-field" id="brief-project-duration-website-container" style="display:none;">
            <label class="brief-label">PROJECT DURATION FOR WEBSITE</label>
            <div class="brief-value" id="brief-project-duration-website"></div>
        </div>
        <div class="brief-field" id="brief-project-duration-container" style="display:none;">
            <label class="brief-label">PROJECT DURATION</label>
            <div class="brief-value" id="brief-project-duration"></div>
        </div>
        <div class="brief-field" id="brief-guaranteed-container" style="display:none;">
            <label class="brief-label">GUARANTEED</label>
            <div class="brief-value" id="brief-guaranteed"></div>
        </div>
        <div class="brief-field" id="brief-nda-container" style="display:none;">
            <label class="brief-label">NDA</label>
            <div class="brief-value" id="brief-nda"></div>
        </div>
        <div class="brief-field" id="brief-print-options-container" style="display:none;">
            <label class="brief-label">Print Options (Indonesia only)</label>
            <div class="brief-value" id="brief-print-options"></div>
        </div>
        <div class="brief-section">
            <h3 class="brief-section-title">Language</h3>
            <div class="brief-field">
                <select class="brief-select" id="brief-language">
                    <option value="English">English</option>
                    <option value="Spanish">Spanish</option>
                    <option value="French">French</option>
                    <option value="German">German</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="brief-right-column">
<div class="brief-section">
    <h3 class="brief-section-title">Background information</h3>
    <div class="brief-field">
        <label class="brief-label">NAME TO INCORPORATE IN THE LOGO</label>
        <div class="brief-value" id="brief-brand-name"></div>
    </div>
    <div class="brief-field">
        <label class="brief-label">SLOGAN</label>
        <div class="brief-value" id="brief-slogan"></div>
    </div>
    <div class="brief-field">
        <label class="brief-label">DESCRIPTION</label>
        <div class="brief-value" id="brief-description"></div>
    </div>
    <div class="brief-field">
        <label class="brief-label">INDUSTRY</label>
        <div class="brief-value" id="brief-industry"></div>
    </div>
    <div class="brief-field">
        <label class="brief-label">NOTES</label>
        <div class="brief-value" id="brief-notes"></div>
    </div>
</div>

<div class="brief-section">
    <h3 class="brief-section-title">Visual style</h3>
    <div class="brief-field">
        <label class="brief-label">COLORS</label>
        <div class="brief-color-palette" id="brief-colors">
            </div>
    </div>
    <div class="brief-field">
        <label class="brief-label">STYLE ATTRIBUTES</label>
        <div class="brief-style-sliders" id="brief-style-attributes">
            </div>
    </div>
</div>

<div class="brief-section">
    <h3 class="brief-section-title">Design Inspiration</h3>
    <div class="brief-field">
        <label class="brief-label">DESIGN INSPIRATION</label>
        <div class="brief-inspiration-grid" id="brief-design-inspiration">
            </div>
    </div>
</div>

<div class="brief-section">
    <h3 class="brief-section-title">Deliverables</h3>
    <div class="brief-field">
        <label class="brief-label">DELIVERABLES</label>
        <div class="brief-value" id="brief-deliverables">
            </div>
    </div>
</div>

<div class="brief-section">
    <h3 class="brief-section-title">Files deliverables</h3>
    <div id="brief-files-deliverables">
        </div>
</div>

<div class="brief-section">
    <h3 class="brief-section-title">Final files</h3>
    <div id="brief-final-files">
        </div>
</div>
</div>
</div>
<div style="text-align: center; margin-top: 40px;">
<button class="btn btn-primary" id="proceedToLogin" style="margin-right: 20px;">
            Proceed to Login
          </button>
<button class="btn btn-secondary" id="editSelections" style="margin-right: 20px;">
            Edit Selections
          </button>
<button class="btn btn-secondary" id="exportPDF">
            Export as PDF
          </button>
</div>
</div>
</div>
</div>
<div class="navigation">
<div class="nav-buttons">
<button class="btn btn-secondary" id="prevBtn" style="display: none;">
        ← Back
      </button>
<div class="nav-info">
<span id="currentStep">Step 1 of 6</span>
</div>
<button class="btn btn-primary" id="nextBtn">
        Next →
      </button>
</div>
</div>
@endsection

@push("scripts")
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
<script src="{{ asset("assets/js/firebase-config.js") }}"></script>

<script>
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
        briefId: null
      },
      serviceRequirements: {},
      selectedPackage: null,
      projectOptions: {
        title: "",
        guaranteed: false,
        nda: false,
        duration: "7",
        websiteDuration: "2-4 weeks",
        printOptions: {
          enabled: false,
          sided: "single",
          paper: "matte",
          corners: "square",
          quantity: 250
        }
      },
      businessCardPrinting: {} // Add this for consistency
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
        window.location.href = `{{ url("signup") }}?email=${encodeURIComponent(appState.briefDetails.email)}&briefId=${briefId}`;
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
      document.querySelectorAll("input[name=\"serviceType\"]").forEach(radio => {
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
      const selectedService = document.querySelector("input[name=\"serviceType\"]:checked")?.value;
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
        serviceType: document.querySelector("input[name=\"serviceType\"]:checked")?.value || "",
        notes: document.getElementById("notes")?.value || ""
      };

      const serviceType = appState.briefDetails.serviceType;
      if (serviceType === "Website") {
        appState.serviceRequirements = {
          pageCount: document.getElementById("pageCount")?.value || "",
          websiteType: document.getElementById("websiteType")?.value || "",
          features: Array.from(document.querySelectorAll("input[name=\"features\"]:checked")).map(cb => cb.value)
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
        if (["Website", "Landing Page", "Other", "Web Design Only"].includes(serviceType)) {
            document.getElementById("brief-project-duration-website").textContent = safeGet(appState, "projectOptions.websiteDuration");
            projectDurationWebsiteContainer.style.display = "block";
        } else {
            projectDurationWebsiteContainer.style.display = "none";
        }
        
        const projectDurationContainer = document.getElementById("brief-project-duration-container");
        if (["bronze", "silver", "gold", "platinum"].includes(appState.selectedPackage) && !["Website", "Landing Page", "Other", "Web Design Only"].includes(serviceType)) {
            document.getElementById("brief-project-duration").textContent = safeGet(appState, "projectOptions.projectDuration") + " days";
            projectDurationContainer.style.display = "block";
        } else {
            projectDurationContainer.style.display = "none";
        }
        
        const guaranteedContainer = document.getElementById("brief-guaranteed-container");
        if (safeGet(appState, "projectOptions.guaranteed")) {
            document.getElementById("brief-guaranteed").innerHTML = "><span class="guaranteed-nda-tag">GUARANTEED</span>";
            guaranteedContainer.style.display = "block";
        } else { guaranteedContainer.style.display = "none"; }
        
        const ndaContainer = document.getElementById("brief-nda-container");
        if (safeGet(appState, "projectOptions.nda")) {
            document.getElementById("brief-nda").innerHTML = "><span class="guaranteed-nda-tag">NDA</span>";
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
            case "silver": case "gold": case "Logo & Brand Identity Pack (most popular)": case "Logo & Brand Identity Pack": return ["Logo in AI and SVG format", "Typography", "Color palette", "Brand guidelines"];
            case "website": case "Website": return ["Complete website design", "Responsive layout", "Source code", "SEO optimization"];
            default: return ["Logo in AI and SVG format", "Typography", "Color palette"];
        }
    }
    
    function getFilesDeliverables(serviceType) {
        switch(serviceType) {
            case "bronze": case "Logo only": case "Logo Only": return [{ icon: "📋", name: "1x Logo" }];
            case "silver": case "gold": case "Logo & Brand Identity Pack (most popular)": case "Logo & Brand Identity Pack": return [{ icon: "📋", name: "1x Logo" }, { icon: "💼", name: "1x Business card" }, { icon: "📄", name: "1x Letterhead" }, { icon: "📘", name: "1x Envelope" }, { icon: "📱", name: "1x Facebook cover" }];
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
            const response = await fetch("{{ url("api/brief/save") }}", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ firebase_uid: uid, brief: appState })
            });
            if (response.ok) {
                alert("Changes saved successfully!");
                window.location.href = "{{ url("dashboard") }}";
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
      window.location.href = `{{ url("signup") }}?email=${encodeURIComponent(email)}`;
    }

    function exportToPDF() {
      // Generate PDF using browser's print functionality
      // Create a new window with the brief content
      const briefContent = document.getElementById("section-6").cloneNode(true);
      
      // Remove buttons from the cloned content
      const buttons = briefContent.querySelectorAll("button");
      buttons.forEach(button => button.remove());
      
      // Create a new window for PDF generation
      const printWindow = window.open("", "_blank");
      printWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
          <title>DsignLoft Creative Brief</title>
          <style>
                @font-face {
                  font-family: "Graphik";
                  src: url("{{ asset("assets/fonts/Graphik Italic.woff") }}") format("woff");
                  font-weight: 400;
                  font-style: normal;
                }
            
                @font-face {
                  font-family: "Graphik";
                  src: url("{{ asset("assets/fonts/Graphik Regular.woff") }}") format("woff");
                  font-weight: 500;
                  font-style: normal;
                }
            
                @font-face {
                  font-family: "Graphik";
                  src: url("{{ asset("assets/fonts/Graphik Medium Regular.woff") }}") format("woff");
                  font-weight: 700;
                  font-style: normal;
                }
                
                body {
                  font-family: "Graphik", sans-serif;
                }
                
                .project-title-container {
                    margin-bottom: 5px;
                }
            
                .project-title-container h2 {
                    font-size: 1.5rem;
                    font-weight: 700;
                    color: #333;
                    padding: 10px 0;
                }
            
                .nav-tabs {
                    display: flex;
                    gap: 30px;
                    border-bottom: 1px solid #e9e9e9;
                    padding-top: 5px;
                }
            
                .nav-tab {
                    padding: 12px 0;
                    padding-bottom: 15px;
                    cursor: pointer;
                    border-bottom: 3px solid transparent;
                    font-weight: 700;
                    color: #666;
                    transition: all 0.2s ease;
                }
            
                .nav-tab:hover {
                    color: #53AB81;
                }
            
                .nav-tab.active {
                    color: #333;
                    border-bottom-color: #53AB81;
                }
            
                /* --- Main Content Styles --- */
                .main-container {
                    max-width: 1210px;
                    margin: 30px auto;
                    padding: 0 20px;
                }
            
                .tab-content {
                    display: none;
                    padding-top: 15px;
                }
            
                .tab-content.active {
                    display: block;
                }
            
                .info-bar {
                    background-color: #333;
                    color: white;
                    padding: 12px 20px;
                    margin-top: -32px;
                    margin-bottom: 30px;
                    border-radius: 6px;
                    text-align: center;
                    font-size: 16px;
                    font-weight: 500;
                }
            
                .info-bar a {
                    color: #53AB81;
                    text-decoration: underline;
                    font-weight: 600;
                }
        
                /* Brief Layout Styles */
                .brief-container {
                    display: grid;
                    grid-template-columns: 300px 1fr;
                    gap: 30px;
                    max-width: 1200px;
                    margin: 0 auto;
                    background: white;
                    padding: 30px 20px;
                    border-radius: 8px;
                    border: 1px solid #e9e9e9;
                }
                
                .brief-left-column {
                    background: #f8f9fa;
                    padding: 20px;
                    border-radius: 8px;
                }
                
                .brief-right-column {
                    background: white;
                    padding: 20px;
                    border-radius: 8px;
                    border: 1px solid #e0e0e0;
                }
                
                .brief-column {
                    background: white;
                    border: 1px solid #e9e9e9;
                    border-radius: 8px;
                    padding: 30px;
                }
                
                .brief-section {
                    margin-bottom: 30px;
                }
        
                .brief-section:last-child {
                    margin-bottom: 0;
                }
        
                .brief-section h4,
                .brief-section-title {
                    font-size: 16px;
                    font-weight: 600;
                    color: #333;
                    margin-bottom: 15px;
                    padding-bottom: 8px;
                    border-bottom: 2px solid #53AB81;
                }
                
                .brief-field {
                    margin-bottom: 20px;
                }
                
                .brief-label { 
                    display: block;
                    font-size: 14px;
                    font-weight: 600; 
                    color: #666; 
                    text-transform: uppercase; 
                    letter-spacing: 0.5px; 
                    margin-bottom: 5px; 
                }
                
                .brief-value { 
                    font-size: 14px;
                    color: #333; 
                    margin-bottom: 15px; 
                    line-height: 1.6; 
                    min-height: 20px;
                    word-wrap: break-word;
                }
                
                .brief-select {
                    width: 100%;
                    padding: 8px 12px;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                    font-size: 14px;
                    background: white;
                }
                
                .package-display {
                    display: flex;
                    gap: 10px;
                    align-items: center;
                }
        
                .package-name-box {
                    padding: 5px 10px;
                    border-radius: 5px;
                    font-weight: 600;
                    color: white;
                }
        
                .package-price-box {
                    background-color: #333;
                    color: white;
                    padding: 5px 10px;
                    border-radius: 5px;
                    font-weight: 600;
                }
                
                .brief-color-palette {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 15px;
                    margin-top: 30px;
                    margin-bottom: 30px;
                }
                
                .brief-color-box {
                    width: 180px;
                    height: 180px;
                    border-radius: 8px;
                    border: 2px solid #ddd;
                    background: #f0f0f0;
                    flex-shrink: 0;
                }
                
                .brief-color-swatch {
                  width: 60px;
                  height: 60px;
                  border-radius: 4px;
                  border: 2px solid #ddd;
                  display: flex;
                  flex-direction: column;
                }
            
                .brief-color-row {
                  flex: 1;
                }
                
                .brief-style-sliders {
                    margin-top: 30px;
                    margin-bottom: 30px;
                }
                
                .brief-style-slider {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 40px;
                    font-size: 14px;
                    width: 100%;
                    color: #666;
                }
                
                .brief-style-left-label {
                    flex-shrink: 0;
                    margin-right: 15px;
                    font-weight: 550;
                    width: 100px;
                    text-align: left;
                    color: #666;
                }
                
                .brief-style-right-label {
                    flex-shrink: 0;
                    margin-left: 15px;
                    font-weight: 550;
                    width: 100px;
                    text-align: left;
                }
                
                .brief-style-slider-track {
                    flex: 1;
                    height: 6px;
                    background: #e0e0e0;
                    border-radius: 2px;
                    position: relative;
                    width: 250px;
                    max-width: 400px;
                    min-width: auto;
                }
                
                .brief-style-slider-thumb {
                    position: absolute;
                    top: -8px;
                    width: 22px;
                    height: 22px;
                    background: #53AB81;
                    border-radius: 50%;
                    transform: translateX(-50%);
                }
                
                .inspiration-images {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
                    gap: 15px;
                    margin-top: 30px;
                }
                
                .inspiration-image {
                    aspect-ratio: 1;
                    border-radius: 8px;
                    overflow: hidden;
                    border: 2px solid #e9e9e9;
                }
                
                .inspiration-image img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
        
                .brief-inspiration-grid {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 15px;
                    margin-top: 30px;
                }
                
                .brief-inspiration-item {
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    overflow: hidden;
                    background: white;
                    aspect-ratio: 1;
                }
                
                .brief-inspiration-image {
                    width: 100%;
                    height: 100%;
                    background: #f0f0f0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 12px;
                    color: #666;
                    overflow: hidden;
                }
        
                .brief-deliverable-row {
                  display: flex;
                  align-items: center;
                  margin-bottom: 15px;
                  padding: 10px;
                  background: #f8f9fa;
                  border-radius: 6px;
                }
                
                .brief-deliverable-icon {
                    font-size: 24px;
                    margin-right: 15px;
                    width: 40px;
                    text-align: center;
                }
                
                .brief-deliverable-info {
                    flex: 1;
                }
                
                .brief-deliverable-name {
                    font-weight: 600;
                    font-size: 14px;
                    margin-bottom: 10px;
                }
                
                .brief-deliverable-actions {
                  font-size: 12px;
                  color: #666;
                }
                
                .brief-deliverable-status,
                .brief-deliverable-download {
                  margin-right: 15px;
                  cursor: pointer;
                }
                
                .brief-deliverable-download:hover {
                  color: #53AB81;
                }
                
                .brief-file-options {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 8px;
                    margin-top: 8px;
                }
                
                .brief-file-option {
                    background: #f8f9fa;
                    border: 1px solid #e9e9e9;
                    border-radius: 4px;
                    padding: 4px 8px;
                    font-size: 12px;
                    font-weight: 600;
                    color: #666;
                }
                
                .deliverable-item {
                    padding: 4px 0;
                    font-size: 14px;
                    color: #333;
                }
          </style>
        </head>
        <body>
            ${briefContent.outerHTML}
        </body>
        </html>
        `);
      
      printWindow.document.close();
      
      // Wait for content to load, then trigger print
      setTimeout(() => {
        printWindow.print();
        printWindow.close();
      }, 500);
    }
    
    async function loadSavedData() {
      const urlParams = new URLSearchParams(window.location.search);
      const uid = urlParams.get("uid");
      let data = null;

      // We use appState.isEditMode, which was already set when the page loaded.
      if (appState.isEditMode && uid) {
          try {
              const response = await fetch(`{{ url("api/brief/get") }}?uid=${uid}`);
              if (response.ok) {
                  data = await response.json();
              } else {
                  console.error("Failed to fetch brief for edit mode.");
                  alert("Could not load your saved brief. Please try again.");
                  return; // Stop if we can't load the data
              }
          } catch (error) {
              console.error("Error fetching brief:", error);
              alert("An error occurred while loading your brief.");
              return;
          }
      } else {
          // Not in edit mode, try localStorage for a new brief in progress
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
          // **THE CRITICAL FIX IS HERE**
          // We store the correct 'isEditMode' status before it gets overwritten.
          const correctEditModeStatus = appState.isEditMode;

          // Now, we load the saved data, which will overwrite the entire appState.
          Object.assign(appState, data);

          // Finally, we restore the correct 'isEditMode' status. This ensures
          // that even though the saved data had 'isEditMode:false', the application
          // knows it is currently in an active edit session.
          appState.isEditMode = correctEditModeStatus;
          
          restoreUIState();
      }
    }


    function restoreUIState() {
      // Restore logo selections
      appState.selectedLogos.forEach(src => {
        const item = document.querySelector(`[data-src="${src}"]`);
        if (item) item.classList.add("selected");
      });
      updateLogoCount();

      // Restore color selections
      appState.selectedColors.forEach(colorObj => {
        if(colorObj.color === "custom") {
            document.getElementById("customColorInput").value = colorObj.name;
        } else {
            const item = document.querySelector(`[data-color="${colorObj.color}"]`);
            if (item) item.classList.add("selected");
        }
      });
      updateColorCount();

      // Restore style sliders
      Object.entries(appState.brandStyles).forEach(([key, value]) => {
        const sliderId = { classicToModern: "style1", matureToYouthful: "style2", feminineToMasculine: "style3", playfulToSophisticated: "style4", economicalToLuxurious: "style5", geometricToOrganic: "style6", abstractToLiteral: "style7" }[key];
        if (sliderId) document.getElementById(sliderId).value = value;
      });

      // Restore form data
      Object.entries(appState.briefDetails).forEach(([key, value]) => {
        const input = document.getElementById(key);
        if (input) {
          if(input.name === "serviceType") {
              const radio = document.querySelector(`input[name="serviceType"][value="${value}"]`);
              if(radio) radio.checked = true;
          } else {
              input.value = value;
          }
        }
      });
      
      // Restore service-specific fields
      handleServiceTypeChange();
      if (appState.serviceRequirements) {
        Object.entries(appState.serviceRequirements).forEach(([key, value]) => {
          if (key === "features") {
            value.forEach(feature => {
              const checkbox = document.querySelector(`input[name="features"][value="${feature}"]`);
              if (checkbox) checkbox.checked = true;
            });
          } else {
            const el = document.getElementById(key);
            if (el) el.value = value;
          }
        });
      }

      // Restore package
      if (appState.selectedPackage) selectPackage(appState.selectedPackage);

      // Restore project options
      if (appState.projectOptions) {
        Object.entries(appState.projectOptions).forEach(([key, value]) => {
            const el = document.getElementById(key);
            if(el) {
                if(el.type === "checkbox") el.checked = value;
                else el.value = value;
            }
        });
      }
      
      // Restore print options
      if (appState.businessCardPrinting && appState.businessCardPrinting.enabled) {
        document.getElementById("printCard").checked = true;
        document.getElementById("printSided").value = appState.businessCardPrinting.options[0];
        document.getElementById("paperStock").value = appState.businessCardPrinting.options[1];
        document.getElementById("cornerStyle").value = appState.businessCardPrinting.options[2];
        document.getElementById("quantity").value = appState.businessCardPrinting.quantity;
      }
      togglePrintFields();
    }

</script>
@endpush

