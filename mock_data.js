// Mock data for testing when API is not available
const mockBriefData = {
  "success": true,
  "brief": {
    "brand_name": "DsignLoft Sample",
    "slogan": "Creative Design Solutions",
    "description": "We provide comprehensive design services including logo design, brand identity, and web development for businesses of all sizes.",
    "industry": "Technology",
    "service_type": "Logo & Brand Identity Pack",
    "language": "English",
    "total_price": "599",
    "project_status": "Active",
    "notes": "Focus on modern, clean design with professional appeal",
    "deliverables": [
      "Logo in AI and SVG format",
      "Typography guidelines",
      "Color palette",
      "Brand guidelines document"
    ],
    "colors": [
      {"name": "Primary Green", "hex": "#53AB81"},
      {"name": "Dark Gray", "hex": "#333333"},
      {"name": "Light Gray", "hex": "#f8f9fa"}
    ],
    "style_attributes": {
      "classic_modern": 75,
      "mature_youthful": 60,
      "feminine_masculine": 65,
      "playful_sophisticated": 70,
      "economical_luxurious": 55,
      "geometric_organic": 80,
      "abstract_literal": 45
    },
    "design_inspiration": [
      "https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo-YKb3yRraylh8w0J6.png",
      "https://assets.zyrosite.com/YleqxM2lNkfl3kLp/designkanjute-portfolio-prio-A85EKnyQrbTPjwKO.png",
      "https://assets.zyrosite.com/YleqxM2lNkfl3kLp/cocolatos-emas-m7V3R3P7xbco63z7.png"
    ],
    "color_requirements": "Modern, professional color scheme with green as primary",
    "attachments": "No attachments",
    "other_notes": "Client prefers minimalist approach with strong brand recognition"
  }
};

// Function to get mock data
function getMockBriefData() {
  return new Promise((resolve) => {
    // Simulate network delay
    setTimeout(() => {
      resolve(mockBriefData);
    }, 500);
  });
}

