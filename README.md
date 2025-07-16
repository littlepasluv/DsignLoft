# app.dsignLoft
🧭 What is app.dsignloft.com?
app.dsignloft.com is the interactive application subdomain of DsignLoft, built to manage the creative brief workflow, user accounts, payment processing, and project collaboration between clients and designers.

It complements the main marketing site dsignloft.com and focuses on functionality, workflow automation, and secure dashboard access.

💡 Core Features:
1. ✍️ Creative Brief Form
      Clients define their design needs through a step-by-step form:
      
      Brand name, slogan, description
      
      Style sliders (modern vs classic, etc.)
      
      Logo/image selection
      
      Color palette
      
      File upload
      
      Service type & package selection

2. 🔐 Secure Authentication
      Firebase or PHP/MySQL login and signup
      
      Email/password registration
      
      Email verification
      
      OAuth2 (Google sign-in optional)
      
      Session management for clients and designers

3. 💳 Payment Gateway
      Integrated payment page after brief submission
      
      Transparent pricing
      
      100% money-back guarantee
      
      Client is redirected to dashboard post-payment

4. 📋 Client Dashboard
      Displays submitted briefs
      
      Allows editing before design starts
      
      Messaging tab to chat with designer
      
      Review tab for giving feedback
      
      Handover tab for final file download

5. 🎨 Designer Dashboard
      Access assigned briefs
      
      Upload design drafts
      
      Receive client reviews (1–5 stars)
      
      Manage handover files
      
      Message clients securely

6. 🛠 Admin Panel
      Monitor client and designer activity
      
      Oversee messages, payments, and project progress
      
      Ensure quality control and dispute management

🌐 Tech Stack Overview:
Frontend: HTML, CSS, JavaScript, Tailwind (optional)

Backend: PHP (Hostinger) with MySQL DB

Optional Auth: Firebase Auth (for OAuth2, email verification)

Hosting: Hostinger Web Hosting + subdomain setup (app.dsignloft.com)

🔗 Example Flow:
User visits dsignloft.com/get-a-design → redirected to app.dsignloft.com

User completes brief form (stored in MySQL or localStorage)

Summary shown → user logs in or signs up

Proceeds to payment → dashboard access unlocked

Designer receives brief → uploads drafts → client reviews

Upon approval, client downloads final files
