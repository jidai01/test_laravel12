<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    <circle cx="50" cy="50" r="48" fill="rgba(255,255,255,0.05)" stroke="rgba(255,255,255,0.1)"
        stroke-width="1" />

    <text x="50%" y="55%" text-anchor="middle" fill="url(#logoGradient)" font-family="Arial, sans-serif" font-weight="900"
        font-size="45" dominant-baseline="middle">
        J
    </text>

    <circle cx="50" cy="50" r="40" fill="none" stroke="url(#logoGradient)" stroke-width="2"
        stroke-dasharray="15 10" />

    <defs>
        <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#60a5fa;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#a855f7;stop-opacity:1" />
        </linearGradient>
    </defs>
</svg>
