<!DOCTYPE html>

<html class="" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin - <?= $page_title ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-container-high": { DEFAULT: "#E8E8E8", dark: "#1e293b" },
                        "surface-container-lowest": { DEFAULT: "#FFFFFF", dark: "#080c14" },
                        "surface-container": { DEFAULT: "#F0F0F0", dark: "#161e2e" },
                        "background": { DEFAULT: "#FFFFFF", dark: "#101622" },
                        "primary": "#0d59f2",
                        "surface-dim": { DEFAULT: "#F0F0F0", dark: "#0c111a" },
                        "on-surface-variant": { DEFAULT: "#666666", dark: "#94a3b8" },
                        "secondary-fixed": { DEFAULT: "#F5F5F5", dark: "#e2e8f0" },
                        "on-secondary-fixed-variant": { DEFAULT: "#333333", dark: "#334155" },
                        "inverse-surface": { DEFAULT: "#101622", dark: "#f8fafc" },
                        "error-container": { DEFAULT: "#FFEBEE", dark: "#7f1d1d" },
                        "inverse-on-surface": { DEFAULT: "#f8fafc", dark: "#0f172a" },
                        "tertiary": "#0ea5e9",
                        "surface-container-low": { DEFAULT: "#F8F8F8", dark: "#101622" },
                        "secondary-fixed-dim": { DEFAULT: "#E0E0E0", dark: "#cbd5e1" },
                        "surface": { DEFAULT: "#FFFFFF", dark: "#101622" },
                        "on-tertiary-fixed": { DEFAULT: "#0ea5e9", dark: "#082f49" },
                        "on-error": "#ffffff",
                        "on-primary-container": { DEFAULT: "#0d59f2", dark: "#dbeafe" },
                        "inverse-primary": { DEFAULT: "#0d59f2", dark: "#60a5fa" },
                        "secondary": { DEFAULT: "#666666", dark: "#334155" },
                        "primary-fixed": { DEFAULT: "#E3F2FD", dark: "#dbeafe" },
                        "outline": { DEFAULT: "#CCCCCC", dark: "#475569" },
                        "tertiary-fixed": { DEFAULT: "#E0F7FA", dark: "#e0f2fe" },
                        "tertiary-container": { DEFAULT: "#E0F7FA", dark: "#0c4a6e" },
                        "on-secondary": { DEFAULT: "#FFFFFF", dark: "#f1f5f9" },
                        "on-primary": "#ffffff",
                        "error": { DEFAULT: "#D32F2F", dark: "#ef4444" },
                        "on-tertiary-fixed-variant": { DEFAULT: "#0ea5e9", dark: "#0369a1" },
                        "surface-bright": { DEFAULT: "#FFFFFF", dark: "#1a2130" },
                        "tertiary-fixed-dim": { DEFAULT: "#B2EBF2", dark: "#bae6fd" },
                        "surface-tint": "#0d59f2",
                        "on-error-container": { DEFAULT: "#D32F2F", dark: "#fee2e2" },
                        "on-primary-fixed": { DEFAULT: "#0d59f2", dark: "#1e3a8a" },
                        "primary-fixed-dim": { DEFAULT: "#BBDEFB", dark: "#93c5fd" },
                        "on-tertiary-container": { DEFAULT: "#0ea5e9", dark: "#e0f2fe" },
                        "on-primary-fixed-variant": { DEFAULT: "#0d59f2", dark: "#1d4ed8" },
                        "primary-container": { DEFAULT: "#E3F2FD", dark: "#1e293b" },
                        "on-surface": { DEFAULT: "#000000", dark: "#f1f5f9" },
                        "outline-variant": { DEFAULT: "#E0E0E0", dark: "#1e293b" },
                        "on-tertiary": "#ffffff",
                        "surface-container-highest": { DEFAULT: "#E0E0E0", dark: "#334155" },
                        "on-background": { DEFAULT: "#000000", dark: "#f8fafc" },
                        "secondary-container": { DEFAULT: "#F5F5F5", dark: "#1e293b" },
                        "on-secondary-fixed": { DEFAULT: "#000000", dark: "#0f172a" },
                        "surface-variant": { DEFAULT: "#F5F5F5", dark: "#1e293b" },
                        "on-secondary-container": { DEFAULT: "#333333", dark: "#94a3b8" }
                    },
                    fontFamily: {
                        "headline": ["Inter"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .text-gradient {
            background: linear-gradient(to right, #0d59f2, #0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="bg-background text-on-background overflow-hidden">