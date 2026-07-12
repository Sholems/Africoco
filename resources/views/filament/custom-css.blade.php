<style>
    /* === Deep Green Sidebar === */
    .fi-sidebar {
        background: linear-gradient(180deg, #064e3b 0%, #047857 100%) !important;
    }
    .fi-sidebar-header {
        background: transparent !important;
        border-bottom: 1px solid rgba(255,255,255,0.1) !important;
    }
    .fi-sidebar-item-label,
    .fi-sidebar-item a,
    .fi-sidebar-item button {
        color: rgba(255,255,255,0.8) !important;
    }
    .fi-sidebar-item a:hover,
    .fi-sidebar-item button:hover {
        color: #fff !important;
        background: rgba(255,255,255,0.1) !important;
    }
    .fi-sidebar-item-active a,
    .fi-sidebar-item-active button {
        color: #fff !important;
        background: rgba(255,255,255,0.15) !important;
    }
    .fi-sidebar-item-active a::before,
    .fi-sidebar-item-active button::before {
        background: #fbbf24 !important; /* amber accent */
    }
    .fi-sidebar-group-label {
        color: rgba(255,255,255,0.5) !important;
    }
    .fi-sidebar .fi-icon-btn-icon {
        color: rgba(255,255,255,0.8) !important;
    }
    .fi-sidebar .fi-icon-btn-icon:hover {
        color: #fff !important;
    }

    /* Sidebar collapse button */
    .fi-sidebar-close-overlay button,
    .fi-sidebar-header button {
        color: rgba(255,255,255,0.8) !important;
    }

    /* Topbar styling */
    .fi-topbar {
        background: #fff !important;
        border-bottom: 1px solid #e5e7eb !important;
    }

    /* === Colorful Dashboard Stats Cards === */
    .stats-card-gradient-1 {
        background: linear-gradient(135deg, #059669 0%, #10b981 50%, #34d399 100%) !important;
        border: none !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3) !important;
    }
    .stats-card-gradient-2 {
        background: linear-gradient(135deg, #d97706 0%, #f59e0b 50%, #fbbf24 100%) !important;
        border: none !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 15px rgba(217, 119, 6, 0.3) !important;
    }
    .stats-card-gradient-3 {
        background: linear-gradient(135deg, #2563eb 0%, #3b82f6 50%, #60a5fa 100%) !important;
        border: none !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3) !important;
    }
    .stats-card-gradient-4 {
        background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 50%, #a78bfa 100%) !important;
        border: none !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3) !important;
    }

    /* Stats card inner elements - ensure white text on dark gradients */
    .stats-card-gradient-1 .fi-wi-stats-overview-stat-value,
    .stats-card-gradient-2 .fi-wi-stats-overview-stat-value,
    .stats-card-gradient-3 .fi-wi-stats-overview-stat-value,
    .stats-card-gradient-4 .fi-wi-stats-overview-stat-value {
        color: #ffffff !important;
    }

    .stats-card-gradient-1 .fi-wi-stats-overview-stat-label,
    .stats-card-gradient-2 .fi-wi-stats-overview-stat-label,
    .stats-card-gradient-3 .fi-wi-stats-overview-stat-label,
    .stats-card-gradient-4 .fi-wi-stats-overview-stat-label {
        color: rgba(255,255,255,0.85) !important;
    }

    .stats-card-gradient-1 .fi-wi-stats-overview-stat-description,
    .stats-card-gradient-2 .fi-wi-stats-overview-stat-description,
    .stats-card-gradient-3 .fi-wi-stats-overview-stat-description,
    .stats-card-gradient-4 .fi-wi-stats-overview-stat-description {
        color: rgba(255,255,255,0.75) !important;
    }

    /* Stat chart sparkline on dark gradient */
    .stats-card-gradient-1 .fi-wi-stats-overview-stat-chart svg path,
    .stats-card-gradient-2 .fi-wi-stats-overview-stat-chart svg path,
    .stats-card-gradient-3 .fi-wi-stats-overview-stat-chart svg path,
    .stats-card-gradient-4 .fi-wi-stats-overview-stat-chart svg path {
        fill: rgba(255,255,255,0.2) !important;
        stroke: rgba(255,255,255,0.5) !important;
    }

    /* Description icon color */
    .stats-card-gradient-1 .fi-wi-stats-overview-stat-description-icon,
    .stats-card-gradient-2 .fi-wi-stats-overview-stat-description-icon,
    .stats-card-gradient-3 .fi-wi-stats-overview-stat-description-icon,
    .stats-card-gradient-4 .fi-wi-stats-overview-stat-description-icon {
        color: rgba(255,255,255,0.85) !important;
    }

    /* === Welcome Banner === */
    .welcome-banner-gradient {
        background: linear-gradient(135deg, #064e3b 0%, #047857 50%, #059669 100%) !important;
        border-radius: 16px !important;
        border: none !important;
    }
</style>
