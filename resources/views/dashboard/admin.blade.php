@extends("layouts.app")

@section("title", "DsignLoft - Super Admin")

@section("content")
<div class="relative flex size-full min-h-screen flex-row group/design-root" style=\'font-family: Inter, "Noto Sans", sans-serif;\'>
<nav class="sidebar fixed top-0 left-0 flex h-screen flex-col bg-[var(--sidebar-bg)] border-r border-[var(--border-color)] p-4 shrink-0 z-20" id="sidebar">
<div class="flex items-center justify-between logo-container mb-6">
<div class="flex items-center gap-3">
<div class="size-8 text-[var(--highlight)]">
<img
      src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/dsign-logo-circle-YrDJzk6p2VI5LMJz.png"
      alt="DsignLoft Icon"
      class="logo-icon"
    />
</div>
<h2 class="text-[var(--text-primary)] text-xl font-bold logo-text">DsignLoft</h2>
</div>
</div>
<div class="flex-grow">
<div class="flex flex-col gap-2">
<a class="flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium nav-link active" data-section="super-admin" href="#"> <span class="material-icons text-xl">dashboard</span><span class="nav-text">Super Admin</span></a>
<a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" data-section="content" href="#"> <span class="material-icons text-xl">description</span><span class="nav-text">Content</span></a>
<a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-link" data-section="users" href="#"> <span class="material-icons text-xl">people</span><span class="nav-text">Users</span></a>
<a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" data-section="messages" href="#"> <span class="material-icons text-xl">message</span><span class="nav-text">Messages</span></a>
<a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" data-section="payments" href="#"> <span class="material-icons text-xl">payment</span><span class="nav-text">Payments</span></a>
<a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" data-section="services" href="#"> <span class="material-icons text-xl">design_services</span><span class="nav-text">Services</span></a>
</div>
</div>
<div class="flex flex-col gap-2">
<a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" href="#"> <span class="material-icons text-xl">settings</span><span class="nav-text">Settings</span></a>
<button class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" id="theme-toggle">
<span class="material-icons text-xl theme-icon">brightness_4</span>
<span class="nav-text">Toggle Theme</span>
</button>
<a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" href="#"> <span class="material-icons text-xl">logout</span><span class="nav-text">Log out</span></a>
</div>
</nav>
<div class="flex flex-1 flex-col main-content" id="main-content">
<header class="sticky top-0 z-10 flex items-center justify-between whitespace-nowrap border-b border-solid border-[var(--border-color)] bg-[var(--sidebar-bg)] px-8 py-4">
<div class="flex items-center gap-4">
<button class="flex items-center justify-center rounded-full size-10 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] transition-transform duration-300 ease-in-out" id="nav-toggle-btn">
<span class="material-icons text-2xl">chevron_left</span>
</button>
<h1 class="text-2xl font-bold text-[var(--text-primary)]" id="header-title">Super Admin Dashboard</h1>
<div id="app">
    <example-component></example-component>
</div>
</div>
<div class="flex items-center gap-4">
<div class="flex items-center gap-3">
<div class="text-sm text-right">
<p class="font-semibold text-[var(--text-primary)]">Prio Nugroho</p>
<p class="text-[var(--text-secondary)]">Super Admin</p>
</div>
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" style=\'background-image: url("https://assets.zyrosite.com/YleqxM2lNkfl3kLp/littlepasluv-AzG353jnK5T6Le67.jpg");\'></div>
</div>
<button class="flex items-center justify-center rounded-full size-10 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)]"> <span class="material-icons text-2xl">notifications</span> </button>
</div>
</header>
<main class="flex-1 bg-[var(--main-bg)] p-8">
<div class="content-section active" id="super-admin-section">
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<div class="lg:col-span-2 flex flex-col gap-8">
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="rounded-lg p-4 bg-[var(--card-bg)] border border-[var(--border-color)]">
  <h3 class="text-xl font-bold mb-2">Live Traffic Summary</h3>
  <p class="text-sm text-[var(--text-secondary)]">Track real-time visits via Google Analytics</p>
  <a href="https://analytics.google.com/" target="_blank" class="text-[var(--highlight)] underline">View Analytics Dashboard</a>
</div>
<div class="flex flex-col gap-2 rounded-lg p-6 bg-[var(--card-bg)] border border-[var(--border-color)]">
<div class="flex items-center justify-between">
<p class="text-[var(--text-secondary)] text-base font-medium">Total Revenue</p>
<span class="material-icons text-[var(--highlight)]">trending_up</span>
</div>
<p class="text-[var(--text-primary)] text-4xl font-bold">$125,430</p>
<p class="text-sm text-[var(--text-secondary)]">+8% from last month</p>
</div>
<div class="flex flex-col gap-2 rounded-lg p-6 bg-[var(--card-bg)] border border-[var(--border-color)]">
<div class="flex items-center justify-between">
<p class="text-[var(--text-secondary)] text-base font-medium">New Users</p>
<span class="material-icons text-[#36a2eb]">person_add</span>
</div>
<p class="text-[var(--text-primary)] text-4xl font-bold">245</p>
<p class="text-sm text-[var(--text-secondary)]">+15 this week</p>
</div>
<div class="flex flex-col gap-2 rounded-lg p-6 bg-[var(--card-bg)] border border-[var(--border-color)]">
<div class="flex items-center justify-between">
<p class="text-[var(--text-secondary)] text-base font-medium">Open Tickets</p>
<span class="material-icons text-[#ff9f40]">support_agent</span>
</div>
<p class="text-[var(--text-primary)] text-4xl font-bold">12</p>
<p class="text-sm text-[var(--text-secondary)]">2 high priority</p>
</div>
</div>
<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
<div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
<h2 class="text-xl font-bold text-[var(--text-primary)]">Recent Service Requests</h2>
<a class="text-sm font-medium text-[var(--highlight)] hover:text-[var(--highlight-hover)]" href="#">View All</a>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-[var(--sidebar-bg)]">
<tr>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Service</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Client</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Status</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Assigned To</th>
</tr>
</thead>
<tbody class="divide-y divide-[var(--border-color)]">
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">Logo Design</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Innovate LLC</td>
<td class="px-6 py-4 whitespace-nowrap"> <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-in-progress">In Progress</span> </td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Sarah Miller</td>
</tr>
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">UI/UX Audit</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">FutureTech</td>
<td class="px-6 py-4 whitespace-nowrap"> <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-completed">Completed</span> </td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">David Chen</td>
</tr>
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">Social Media Graphics</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Connect Social</td>
<td class="px-6 py-4 whitespace-nowrap"> <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-in-review">In Review</span> </td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Emily Carter</td>
</tr>
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">Website Maintenance</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Data Insights</td>
<td class="px-6 py-4 whitespace-nowrap"> <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-unassigned">Unassigned</span> </td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">-</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
<div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
<h2 class="text-xl font-bold text-[var(--text-primary)]">Recent Transactions</h2>
<a class="text-sm font-medium text-[var(--highlight)] hover:text-[var(--highlight-hover)]" href="#">View All</a>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-[var(--sidebar-bg)]">
<tr>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Transaction ID</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Client</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Amount</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Status</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Date</th>
</tr>
</thead>
<tbody class="divide-y divide-[var(--border-color)]">
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">#TXN12345</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Acme Corp</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">$2,500.00</td>
<td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-completed">Paid</span></td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">2024-08-15</td>
</tr>
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">#TXN12346</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Tech Solutions Inc.</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">$1,200.00</td>
<td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-pending">Pending</span></td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">2024-08-14</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="lg:col-span-1 flex flex-col gap-8">
<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)] p-4">
<h3 class="text-xl font-bold text-[var(--text-primary)] mb-4">Content Quick Actions</h3>
<div class="flex flex-col gap-3">
<button class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-[var(--highlight)] text-white rounded-md hover:bg-[var(--highlight-hover)] text-sm font-medium"> <span class="material-icons text-lg">add</span>New Blog Post </button>
<button class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-[var(--nav-hover-bg)] text-[var(--text-primary)] rounded-md hover:bg-opacity-80 text-sm font-medium"> <span class="material-icons text-lg">edit</span>Manage Pages </button>
<button class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-[var(--nav-hover-bg)] text-[var(--text-primary)] rounded-md hover:bg-opacity-80 text-sm font-medium"> <span class="material-icons text-lg">upload_file</span>Upload Media </button>
</div>
</div>
<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
<div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
<h3 class="text-xl font-bold text-[var(--text-primary)]">User Management</h3>
<a class="text-sm font-medium text-[var(--highlight)] hover:text-[var(--highlight-hover)]" href="#">All Users</a>
</div>
<ul class="divide-y divide-[var(--border-color)]">
<li class="p-4 flex justify-between items-center">
<div class="flex items-center gap-3">
<img alt="User Avatar" class="w-10 h-10 rounded-full" src="https://lh3.googleusercontent.com/a/ACg8ocJdC-4O-3oPz_w_dD8-2Jgq2Yc7aPq9oK3n4z7H2Q=s96-c"/>
<div>
<p class="text-sm font-medium text-[var(--text-primary)]">Jane Doe</p>
<p class="text-xs text-[var(--text-secondary)]">Client</p>
</div>
</div>
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-active">Active</span>
</li>
<li class="p-4 flex justify-between items-center">
<div class="flex items-center gap-3">
<img alt="User Avatar" class="w-10 h-10 rounded-full" src="https://lh3.googleusercontent.com/a/ACg8ocK_sA4b-2WzQYJ2X1T_2Z1z5kG9X2m2YwU6K2G2uE=s96-c"/>
<div>
<p class="text-sm font-medium text-[var(--text-primary)]">John Smith</p>
<p class="text-xs text-[var(--text-secondary)]">Designer</p>
</div>
</div>
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-active">Active</span>
</li>
<li class="p-4 flex justify-between items-center">
<div class="flex items-center gap-3">
<img alt="User Avatar" class="w-10 h-10 rounded-full" src="https://lh3.googleusercontent.com/a/ACg8ocJ9b2z_z9z-5K_Y3dE9oT-6z_R7nL2p4A_1wY2P_E=s96-c"/>
<div>
<p class="text-sm font-medium text-[var(--text-primary)]">Peter Jones</p>
<p class="text-xs text-[var(--text-secondary)]">Client</p>
</div>
</div>
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-suspended">Suspended</span>
</li>
</ul>
</div>
<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
<div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
<h3 class="text-xl font-bold text-[var(--text-primary)]">Recent Messages</h3>
<a class="text-sm font-medium text-[var(--highlight)] hover:text-[var(--highlight-hover)]" href="#">Go to Inbox</a>
</div>
<ul class="divide-y divide-[var(--border-color)]">
<li class="p-4 hover:bg-[var(--nav-hover-bg)] cursor-pointer">
<div class="flex items-center gap-3">
<img alt="User Avatar" class="w-10 h-10 rounded-full" src="https://lh3.googleusercontent.com/a/ACg8ocK_sA4b-2WzQYJ2X1T_2Z1z5kG9X2m2YwU6K2G2uE=s96-c"/>
<div>
<p class="text-sm font-medium text-[var(--text-primary)]">David Chen</p>
<p class="text-xs text-[var(--text-secondary)] truncate w-48">Hey, just checking in on the audit progress...</p>
</div>
</div>
</li>
<li class="p-4 hover:bg-[var(--nav-hover-bg)] cursor-pointer">
<div class="flex items-center gap-3">
<img alt="User Avatar" class="w-10 h-10 rounded-full" src="https://lh3.googleusercontent.com/a/ACg8ocJdC-4O-3oPz_w_dD8-2Jgq2Yc7aPq9oK3n4z7H2Q=s96-c"/>
<div>
<p class="text-sm font-medium text-[var(--text-primary)]">Innovate LLC</p>
<p class="text-xs text-[var(--text-secondary)] truncate w-48">Can we get a quick update on the logo concepts?</p>
</div>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="content-section" id="content-section">
<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
<div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
<h2 class="text-xl font-bold text-[var(--text-primary)]">Manage Content</h2>
<button class="w-full max-w-xs flex items-center justify-center gap-2 px-4 py-2 bg-[var(--highlight)] text-white rounded-md hover:bg-[var(--highlight-hover)] text-sm font-medium"> <span class="material-icons text-lg">add</span>New Post</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-[var(--sidebar-bg)]">
<tr>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Title</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Author</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Status</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Last Updated</th>
</tr>
</thead>
<tbody class="divide-y divide-[var(--border-color)]">
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">The Future of UI/UX</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Alex Hudson</td>
<td class="px-6 py-4 whitespace-nowrap"> <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-completed">Published</span> </td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">2024-08-10</td>
</tr>
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">10 Design Trends for 2025</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Sarah Miller</td>
<td class="px-6 py-4 whitespace-nowrap"> <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-in-review">Draft</span> </td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">2024-08-12</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="content-section" id="users-section">
<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
<div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
<h2 class="text-xl font-bold text-[var(--text-primary)]">Manage Users</h2>
<button class="w-full max-w-xs flex items-center justify-center gap-2 px-4 py-2 bg-[var(--highlight)] text-white rounded-md hover:bg-[var(--highlight-hover)] text-sm font-medium"> <span class="material-icons text-lg">person_add</span>New User</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-[var(--sidebar-bg)]">
<tr>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">User</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Role</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Status</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Join Date</th>
</tr>
</thead>
<tbody class="divide-y divide-[var(--border-color)]">
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">Jane Doe</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Client</td>
<td class="px-6 py-4 whitespace-nowrap"> <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-active">Active</span> </td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">2023-01-15</td>
</tr>
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">John Smith</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Designer</td>
<td class="px-6 py-4 whitespace-nowrap"> <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-active">Active</span> </td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">2023-02-20</td>
</tr>
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">Peter Jones</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Client</td>
<td class="px-6 py-4 whitespace-nowrap"> <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-suspended">Suspended</span> </td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">2023-03-05</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="content-section h-[calc(100vh-144px)]" id="messages-section">
<div class="flex h-full rounded-lg border border-[var(--border-color)] bg-[var(--card-bg)]">
<div class="w-1/3 flex flex-col border-r border-[var(--border-color)]">
<div class="p-4 border-b border-[var(--border-color)]">
<input class="w-full bg-[var(--main-bg)] text-[var(--text-primary)] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[var(--highlight)] text-sm" placeholder="Search or start new chat" type="text"/>
</div>
<div class="flex-grow overflow-y-auto">
<ul class="divide-y divide-[var(--border-color)]">
<li class="p-3 flex items-center cursor-pointer hover:bg-[var(--nav-hover-bg)] chat-list-item active">
<img alt="User Avatar" class="w-12 h-12 rounded-full mr-4" src="https://lh3.googleusercontent.com/a/ACg8ocK_sA4b-2WzQYJ2X1T_2Z1z5kG9X2m2YwU6K2G2uE=s96-c"/>
<div class="flex-grow">
<div class="flex justify-between items-center">
<h3 class="font-semibold text-white">David Chen</h3>
<p class="text-xs text-gray-400">10:45 AM</p>
</div>
<p class="text-sm text-gray-400 truncate">Hey, just checking in on the audit progress...</p>
</div>
</li>
<li class="p-3 flex items-center cursor-pointer hover:bg-[var(--nav-hover-bg)] chat-list-item">
<img alt="User Avatar" class="w-12 h-12 rounded-full mr-4" src="https://lh3.googleusercontent.com/a/ACg8ocJdC-4O-3oPz_w_dD8-2Jgq2Yc7aPq9oK3n4z7H2Q=s96-c"/>
<div class="flex-grow">
<div class="flex justify-between items-center">
<h3 class="font-semibold text-[var(--text-primary)]">Innovate LLC</h3>
<p class="text-xs text-[var(--text-secondary)]">Yesterday</p>
</div>
<p class="text-sm text-[var(--text-secondary)] truncate">Can we get a quick update on the logo concepts?</p>
</div>
</li>
<li class="p-3 flex items-center cursor-pointer hover:bg-[var(--nav-hover-bg)] chat-list-item">
<div class="relative mr-4">
<img alt="User Avatar" class="w-12 h-12 rounded-full" src="https://lh3.googleusercontent.com/a/ACg8ocJ9b2z_z9z-5K_Y3dE9oT-6z_R7nL2p4A_1wY2P_E=s96-c"/>
<span class="absolute -bottom-1 -right-1 flex items-center justify-center size-5 bg-[var(--highlight)] rounded-full text-white text-[10px] font-bold">3</span>
</div>
<div class="flex-grow">
<div class="flex justify-between items-center">
<div class="flex items-center gap-2">
<span class="material-icons text-sm text-[var(--text-secondary)]">groups</span>
<h3 class="font-semibold text-[var(--text-primary)]">Design Sprint Group</h3>
</div>
<p class="text-xs text-[var(--text-secondary)]">Tuesday</p>
</div>
<p class="text-sm text-[var(--text-secondary)] truncate">Peter: Let\'s sync up tomorrow.</p>
</div>
</li>
</ul>
</div>
</div>
<div class="w-2/3 flex flex-col">
<div class="flex items-center p-3 border-b border-[var(--border-color)]">
<img alt="User Avatar" class="w-10 h-10 rounded-full mr-4" src="https://lh3.googleusercontent.com/a/ACg8ocK_sA4b-2WzQYJ2X1T_2Z1z5kG9X2m2YwU6K2G2uE=s96-c"/>
<div>
<h3 class="font-semibold text-[var(--text-primary)]">David Chen</h3>
<p class="text-xs text-[var(--text-secondary)]">online</p>
</div>
<div class="ml-auto flex items-center gap-4 text-[var(--text-secondary)]">
<button class="hover:text-[var(--text-primary)]"><span class="material-icons">search</span></button>
<button class="hover:text-[var(--text-primary)]"><span class="material-icons">more_vert</span></button>
</div>
</div>
<div class="flex-grow overflow-y-auto p-6 bg-[var(--chat-bg)]">
<div class="flex flex-col gap-4">
<div class="self-start max-w-md">
<div class="bg-[var(--chat-bubble-received)] rounded-lg p-3 shadow">
<p class="text-sm text-[var(--text-primary)]">Hey Alex, how\'s the UI/UX audit for FutureTech coming along?</p>
<p class="text-xs text-right text-[var(--text-secondary)] mt-1">10:42 AM</p>
</div>
</div>
<div class="self-end max-w-md">
<div class="bg-[var(--chat-bubble-sent)] rounded-lg p-3 shadow">
<p class="text-sm text-[var(--text-primary)]">Hi David! It\'s going well. I\'ve finished the initial analysis and I\'m compiling the report now. Should have it over to you by EOD tomorrow.</p>
<p class="text-xs text-right text-[var(--text-secondary)] mt-1">10:43 AM</p>
</div>
</div>
<div class="self-start max-w-md">
<div class="bg-[var(--chat-bubble-received)] rounded-lg p-3 shadow">
<p class="text-sm text-[var(--text-primary)]">That\'s great to hear. No rush, just wanted to check in.</p>
<p class="text-xs text-right text-[var(--text-secondary)] mt-1">10:44 AM</p>
</div>
</div>
<div class="self-end max-w-md">
<div class="bg-[var(--chat-bubble-sent)] rounded-lg p-3 shadow">
<p class="text-sm text-[var(--text-primary)]">Appreciate it. Let me know if you need anything else in the meantime.</p>
<p class="text-xs text-right text-[var(--text-secondary)] mt-1">10:44 AM</p>
</div>
</div>
<div class="self-start max-w-md">
<div class="bg-[var(--chat-bubble-received)] rounded-lg p-3 shadow">
<p class="text-sm text-[var(--text-primary)]">Hey, just checking in on the audit progress...</p>
<p class="text-xs text-right text-[var(--text-secondary)] mt-1">10:45 AM</p>
</div>
</div>
</div>
</div>
<div class="flex items-center p-4 bg-[var(--sidebar-bg)]">
<button class="text-[var(--text-secondary)] hover:text-[var(--text-primary)] mr-2"> <span class="material-icons text-2xl">sentiment_satisfied_alt</span> </button>
<button class="text-[var(--text-secondary)] hover:text-[var(--text-primary)] mr-4"> <span class="material-icons text-2xl">attach_file</span> </button>
<input class="flex-grow bg-[var(--main-bg)] text-[var(--text-primary)] rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[var(--highlight)] text-sm" placeholder="Type a message" type="text"/>
<button class="ml-4 bg-[var(--highlight)] text-white rounded-full p-2 hover:bg-[var(--highlight-hover)]"> <span class="material-icons">send</span> </button>
</div>
</div>
</div>
</div>
<div class="content-section" id="payments-section">
<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
<div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
<h2 class="text-xl font-bold text-[var(--text-primary)]">Payments</h2>
<button class="w-full max-w-xs flex items-center justify-center gap-2 px-4 py-2 bg-[var(--highlight)] text-white rounded-md hover:bg-[var(--highlight-hover)] text-sm font-medium"> <span class="material-icons text-lg">receipt_long</span>New Invoice</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-[var(--sidebar-bg)]">
<tr>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Transaction ID</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Client</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Amount</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Status</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Date</th>
</tr>
</thead>
<tbody class="divide-y divide-[var(--border-color)]">
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">#TXN12345</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Acme Corp</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">$2,500.00</td>
<td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-completed">Paid</span></td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">2024-08-15</td>
</tr>
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">#TXN12346</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">Tech Solutions Inc.</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">$1,200.00</td>
<td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-pending">Pending</span></td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">2024-08-14</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="content-section" id="services-section">
<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
<div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
<h2 class="text-xl font-bold text-[var(--text-primary)]">Services</h2>
<button class="w-full max-w-xs flex items-center justify-center gap-2 px-4 py-2 bg-[var(--highlight)] text-white rounded-md hover:bg-[var(--highlight-hover)] text-sm font-medium"> <span class="material-icons text-lg">add_circle</span>New Service</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-[var(--sidebar-bg)]">
<tr>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Service</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Active Projects</th>
<th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Price</th>
</tr>
</thead>
<tbody class="divide-y divide-[var(--border-color)]">
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">Logo Design</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">12</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">$500 - $5,000</td>
</tr>
<tr>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">UI/UX Audit</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">5</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">$1,500</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</main>
</div>
</div>
<script>
        document.addEventListener(\'DOMContentLoaded\', function() {
            const navLinks = document.querySelectorAll(\'.nav-link\');
            const contentSections = document.querySelectorAll(\'.content-section\');
            const headerTitle = document.getElementById(\'header-title\');
            const mainEl = document.querySelector(\'main\');
            navLinks.forEach(link => {
                link.addEventListener(\'click\', function(e) {
                    e.preventDefault();
                    if (this.id === \'theme-toggle\' || this.parentElement.id === \'theme-toggle\') return;
                    navLinks.forEach(navLink => {
                        navLink.classList.remove(\'active\');
                    });
                    this.classList.add(\'active\');
                    const sectionId = this.getAttribute(\'data-section\');
                    // Special handling for messages section to remove padding
                    if(sectionId === \'messages\') {
                        mainEl.classList.remove(\'p-8\');
                    } else {
                        mainEl.classList.add(\'p-8\');
                    }
                    if (sectionId) {
                        const title = this.querySelector(\'.nav-text\').textContent.trim();
                        headerTitle.textContent = title === \'Super Admin\' ? \'Super Admin Dashboard\' : title === \'Messages\' ? \'Messages\' : `${title} Management`;
                        contentSections.forEach(section => {
                            if (section.id === `${sectionId}-section`) {
                                section.classList.add(\'active\');
                            } else {
                                section.classList.remove(\'active\');
                            }
                        });
                    }
                });
            });
            const themeToggle = document.getElementById(\'theme-toggle\');
            const body = document.body;
            const themeIcon = themeToggle.querySelector(\'.theme-icon\');
            themeToggle.addEventListener(\'click\', () => {
                body.classList.toggle(\'dark\');
                body.classList.toggle(\'light\');
                if (body.classList.contains(\'dark\')) {
                    themeIcon.textContent = \'brightness_4\'; // moon for dark mode
                } else {
                    themeIcon.textContent = \'wb_sunny\'; // sun for light mode
                }
            });
            const navToggleBtn = document.getElementById(\'nav-toggle-btn\');
            const sidebar = document.getElementById(\'sidebar\');
            const mainContent = document.getElementById(\'main-content\');
            navToggleBtn.addEventListener(\'click\', () => {
                sidebar.classList.toggle(\'sidebar-collapsed\');
                mainContent.classList.toggle(\'main-content-expanded\');
            });
        });
</script>
@endsection

