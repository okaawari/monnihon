<!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Monnihon — Японы хэл сурах платформ</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300;400;700;900&family=Noto+Sans+Mongolian&family=Shippori+Mincho+B1:wght@400;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <style>
    :root {
      --bg:        #07090f;
      --bg2:       #0d1120;
      --surface:   #111827;
      --surface2:  #1a2235;
      --cherry:    #e8527a;
      --cherry2:   #ff7ba8;
      --gold:      #e8b86d;
      --gold2:     #ffd97d;
      --text:      #e8eaf2;
      --muted:     #7a8299;
      --border:    rgba(232,88,122,0.15);
      --glow:      0 0 60px rgba(232,88,122,0.18);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html { scroll-behavior: smooth; }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      overflow-x: hidden;
      line-height: 1.7;
    }

    /* ─── SCROLLBAR ─── */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb { background: var(--cherry); border-radius: 3px; }

    /* ─── NOISE OVERLAY ─── */
    body::before {
      content: '';
      position: fixed; inset: 0; z-index: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
      pointer-events: none;
      opacity: 0.4;
    }

    /* ─── FLOATING SAKURA ─── */
    .sakura-bg {
      position: fixed; inset: 0; pointer-events: none; z-index: 0; overflow: hidden;
    }
    .petal {
      position: absolute;
      width: 10px; height: 10px;
      background: var(--cherry);
      border-radius: 0 50% 50% 50%;
      opacity: 0;
      animation: fall linear infinite;
    }
    .petal:nth-child(1)  { left: 5%;  animation-duration: 14s; animation-delay: 0s;    width: 8px;  height: 8px;  }
    .petal:nth-child(2)  { left: 15%; animation-duration: 18s; animation-delay: 2s;    opacity: 0; }
    .petal:nth-child(3)  { left: 28%; animation-duration: 12s; animation-delay: 5s;    width: 6px;  height: 6px;  }
    .petal:nth-child(4)  { left: 42%; animation-duration: 16s; animation-delay: 1s;    }
    .petal:nth-child(5)  { left: 55%; animation-duration: 20s; animation-delay: 8s;    width: 12px; height: 12px; }
    .petal:nth-child(6)  { left: 67%; animation-duration: 13s; animation-delay: 3s;    width: 7px;  height: 7px;  }
    .petal:nth-child(7)  { left: 78%; animation-duration: 17s; animation-delay: 6s;    }
    .petal:nth-child(8)  { left: 88%; animation-duration: 11s; animation-delay: 9s;    width: 9px;  height: 9px;  }
    .petal:nth-child(9)  { left: 93%; animation-duration: 15s; animation-delay: 4s;    }
    .petal:nth-child(10) { left: 35%; animation-duration: 19s; animation-delay: 7s;    width: 5px;  height: 5px;  }

    @keyframes fall {
      0%   { transform: translateY(-20px) rotate(0deg);   opacity: 0; }
      10%  { opacity: 0.25; }
      90%  { opacity: 0.12; }
      100% { transform: translateY(110vh) rotate(720deg); opacity: 0; }
    }

    /* ─── NAV ─── */
    nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 100;
      display: flex; align-items: center; justify-content: space-between;
      padding: 0 5%;
      height: 70px;
      background: rgba(7,9,15,0.75);
      backdrop-filter: blur(18px);
      border-bottom: 1px solid var(--border);
      transition: all 0.3s;
    }
    .nav-logo {
      display: flex; align-items: center; gap: 10px;
      font-family: 'Shippori Mincho B1', serif;
      font-size: 1.5rem; font-weight: 800;
      color: var(--text);
      text-decoration: none;
    }
    .nav-logo span { color: var(--cherry); }
    .nav-logo .jp-sub {
      font-size: 0.75rem; color: var(--muted); letter-spacing: 3px;
      font-family: 'Noto Serif JP', serif; font-weight: 300;
    }
    .logo-wrap { display: flex; flex-direction: column; line-height: 1.1; }
    .logo-icon {
      width: 38px; height: 38px;
      background: linear-gradient(135deg, var(--cherry), var(--cherry2));
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-family: 'Noto Serif JP', serif;
      font-size: 1.1rem; color: white; font-weight: 900;
      box-shadow: 0 0 20px rgba(232,88,122,0.4);
    }
    .nav-links {
      display: flex; align-items: center; gap: 32px;
      list-style: none;
    }
    .nav-links a {
      color: var(--muted); text-decoration: none;
      font-size: 0.9rem; font-weight: 500;
      transition: color 0.2s;
      letter-spacing: 0.3px;
    }
    .nav-links a:hover { color: var(--text); }
    .nav-cta {
      padding: 9px 22px;
      background: linear-gradient(135deg, var(--cherry), #c0395e);
      color: white !important;
      border-radius: 8px;
      font-weight: 600 !important;
      transition: transform 0.2s, box-shadow 0.2s !important;
      box-shadow: 0 0 20px rgba(232,88,122,0.3);
    }
    .nav-cta:hover { transform: translateY(-1px); box-shadow: 0 4px 25px rgba(232,88,122,0.45) !important; }

    /* ─── HERO ─── */
    .hero {
      position: relative; z-index: 1;
      min-height: 100vh;
      display: flex; flex-direction: column;
      align-items: center; justify-content: center;
      text-align: center;
      padding: 100px 5% 60px;
      overflow: hidden;
    }

    .hero-kanji-bg {
      position: absolute; inset: 0; z-index: -1;
      display: flex; align-items: center; justify-content: center;
      font-family: 'Noto Serif JP', serif;
      font-size: clamp(180px, 30vw, 380px);
      font-weight: 900;
      color: rgba(232,88,122,0.04);
      letter-spacing: -20px;
      user-select: none;
      line-height: 1;
    }

    .hero-radial {
      position: absolute; inset: 0; z-index: -1;
      background:
        radial-gradient(ellipse 60% 50% at 50% 40%, rgba(232,88,122,0.12) 0%, transparent 70%),
        radial-gradient(ellipse 40% 30% at 80% 70%, rgba(232,184,109,0.07) 0%, transparent 60%);
    }

    .hero-badge {
      display: inline-flex; align-items: center; gap: 8px;
      background: rgba(232,88,122,0.1);
      border: 1px solid rgba(232,88,122,0.3);
      border-radius: 50px;
      padding: 6px 16px;
      font-size: 0.82rem; color: var(--cherry2);
      letter-spacing: 0.5px;
      margin-bottom: 30px;
      animation: fadeUp 0.8s ease both;
    }
    .badge-dot {
      width: 7px; height: 7px;
      border-radius: 50%;
      background: var(--cherry);
      animation: pulse 2s ease infinite;
    }
    @keyframes pulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.5; transform: scale(0.8); }
    }

    .hero h1 {
      font-family: 'Shippori Mincho B1', serif;
      font-size: clamp(2.8rem, 7vw, 6rem);
      font-weight: 800;
      line-height: 1.05;
      margin-bottom: 10px;
      animation: fadeUp 0.8s 0.15s ease both;
    }
    .hero h1 .line1 { display: block; color: var(--text); }
    .hero h1 .line2 {
      display: block;
      background: linear-gradient(90deg, var(--cherry), var(--gold));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .hero-jp-title {
      font-family: 'Noto Serif JP', serif;
      font-size: clamp(1.1rem, 2vw, 1.6rem);
      color: var(--muted);
      font-weight: 300;
      letter-spacing: 8px;
      margin-bottom: 28px;
      animation: fadeUp 0.8s 0.25s ease both;
    }
    .hero-desc {
      max-width: 560px;
      font-size: 1.05rem;
      color: #9aa3bb;
      line-height: 1.8;
      margin-bottom: 44px;
      animation: fadeUp 0.8s 0.35s ease both;
    }
    .hero-actions {
      display: flex; gap: 16px; flex-wrap: wrap;
      justify-content: center;
      animation: fadeUp 0.8s 0.45s ease both;
    }
    .btn-primary {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 15px 34px;
      background: linear-gradient(135deg, var(--cherry), #b8305a);
      color: white;
      border-radius: 12px;
      font-weight: 600; font-size: 0.97rem;
      text-decoration: none;
      transition: transform 0.2s, box-shadow 0.2s;
      box-shadow: 0 4px 30px rgba(232,88,122,0.35);
    }
    .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 40px rgba(232,88,122,0.5); }
    .btn-secondary {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 15px 34px;
      background: transparent;
      color: var(--text);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 12px;
      font-weight: 500; font-size: 0.97rem;
      text-decoration: none;
      transition: border-color 0.2s, background 0.2s;
    }
    .btn-secondary:hover { border-color: var(--cherry); background: rgba(232,88,122,0.05); }

    .hero-stats {
      display: flex; gap: 48px; flex-wrap: wrap;
      justify-content: center;
      margin-top: 64px;
      padding-top: 40px;
      border-top: 1px solid rgba(255,255,255,0.06);
      animation: fadeUp 0.8s 0.6s ease both;
      width: 100%;
    }
    .stat-item { text-align: center; }
    .stat-num {
      font-family: 'Shippori Mincho B1', serif;
      font-size: 2.2rem; font-weight: 800;
      color: var(--gold);
      line-height: 1;
    }
    .stat-label { font-size: 0.82rem; color: var(--muted); margin-top: 4px; }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ─── SECTION COMMON ─── */
    section { position: relative; z-index: 1; }
    .section-inner { max-width: 1180px; margin: 0 auto; padding: 100px 5%; }
    .section-tag {
      display: inline-flex; align-items: center; gap: 8px;
      font-size: 0.78rem; letter-spacing: 3px; text-transform: uppercase;
      color: var(--cherry); font-weight: 600;
      margin-bottom: 16px;
    }
    .section-tag::before {
      content: ''; display: block;
      width: 24px; height: 1px; background: var(--cherry);
    }
    .section-title {
      font-family: 'Shippori Mincho B1', serif;
      font-size: clamp(1.8rem, 3.5vw, 2.8rem);
      font-weight: 800;
      line-height: 1.2;
      margin-bottom: 16px;
    }
    .section-title em { font-style: normal; color: var(--cherry); }
    .section-desc { color: var(--muted); font-size: 1rem; max-width: 520px; line-height: 1.8; }

    /* ─── FEATURES ─── */
    .features-section { background: var(--bg2); }
    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 24px;
      margin-top: 56px;
    }
    .feature-card {
      background: var(--surface);
      border: 1px solid rgba(255,255,255,0.06);
      border-radius: 18px;
      padding: 36px 32px;
      transition: transform 0.3s, border-color 0.3s, box-shadow 0.3s;
      position: relative; overflow: hidden;
    }
    .feature-card::before {
      content: '';
      position: absolute; top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--cherry), var(--gold));
      opacity: 0;
      transition: opacity 0.3s;
    }
    .feature-card:hover { transform: translateY(-5px); border-color: var(--border); box-shadow: var(--glow); }
    .feature-card:hover::before { opacity: 1; }
    .feature-icon {
      width: 52px; height: 52px;
      background: rgba(232,88,122,0.1);
      border: 1px solid rgba(232,88,122,0.2);
      border-radius: 13px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.5rem;
      margin-bottom: 22px;
    }
    .feature-card h3 {
      font-family: 'Shippori Mincho B1', serif;
      font-size: 1.25rem; font-weight: 700;
      margin-bottom: 12px;
      color: var(--text);
    }
    .feature-card p { color: var(--muted); font-size: 0.93rem; line-height: 1.75; }
    .feature-jp {
      position: absolute; bottom: 20px; right: 24px;
      font-family: 'Noto Serif JP', serif;
      font-size: 2.5rem; font-weight: 900;
      color: rgba(232,88,122,0.06);
      line-height: 1;
    }

    /* ─── HOW IT WORKS ─── */
    .steps-wrap {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 80px; align-items: center;
      margin-top: 60px;
    }
    .steps-list { display: flex; flex-direction: column; gap: 0; }
    .step-item {
      display: flex; gap: 24px;
      padding: 28px 0;
      border-bottom: 1px solid rgba(255,255,255,0.05);
      cursor: pointer;
      transition: all 0.3s;
    }
    .step-item:last-child { border-bottom: none; }
    .step-item:hover .step-num { background: var(--cherry); color: white; border-color: var(--cherry); }
    .step-num {
      flex-shrink: 0;
      width: 44px; height: 44px;
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      font-family: 'Shippori Mincho B1', serif;
      font-size: 1.1rem; font-weight: 800;
      color: var(--muted);
      transition: all 0.3s;
    }
    .step-content h4 {
      font-family: 'Shippori Mincho B1', serif;
      font-size: 1.1rem; font-weight: 700;
      margin-bottom: 6px;
    }
    .step-content p { color: var(--muted); font-size: 0.9rem; line-height: 1.7; }
    .steps-visual {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 40px;
      text-align: center;
      box-shadow: var(--glow);
      position: relative; overflow: hidden;
    }
    .steps-visual::after {
      content: '日';
      position: absolute; bottom: -20px; right: -10px;
      font-family: 'Noto Serif JP', serif;
      font-size: 180px; font-weight: 900;
      color: rgba(232,88,122,0.04);
      line-height: 1;
    }
    .level-badges {
      display: flex; flex-wrap: wrap; gap: 10px;
      justify-content: center; margin-bottom: 28px;
    }
    .level-badge {
      padding: 8px 18px;
      border-radius: 50px;
      font-size: 0.85rem; font-weight: 600;
      border: 1px solid rgba(255,255,255,0.1);
      color: var(--muted);
    }
    .level-badge.active {
      background: linear-gradient(135deg, var(--cherry), #b8305a);
      border-color: transparent; color: white;
      box-shadow: 0 4px 15px rgba(232,88,122,0.35);
    }
    .hiragana-chart {
      display: grid; grid-template-columns: repeat(5, 1fr);
      gap: 8px; margin-top: 10px;
    }
    .kana-cell {
      background: var(--surface2);
      border: 1px solid rgba(255,255,255,0.06);
      border-radius: 10px;
      padding: 12px 6px;
      text-align: center;
    }
    .kana-cell .jp { font-family: 'Noto Serif JP', serif; font-size: 1.3rem; color: var(--text); }
    .kana-cell .ro { font-size: 0.7rem; color: var(--muted); margin-top: 2px; }

    /* ─── COURSES ─── */
    .courses-section { background: var(--bg2); }
    .courses-header {
      display: flex; justify-content: space-between;
      align-items: flex-end; flex-wrap: wrap;
      gap: 20px; margin-bottom: 48px;
    }
    .courses-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 22px;
    }
    .course-card {
      background: var(--surface);
      border: 1px solid rgba(255,255,255,0.06);
      border-radius: 20px;
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .course-card:hover { transform: translateY(-6px); box-shadow: var(--glow); }
    .course-cover {
      height: 140px;
      display: flex; align-items: center; justify-content: center;
      font-family: 'Noto Serif JP', serif;
      font-size: 4rem; font-weight: 900;
      position: relative; overflow: hidden;
    }
    .course-cover.pink   { background: linear-gradient(135deg, #2d1220, #4a1530); color: var(--cherry2); }
    .course-cover.gold   { background: linear-gradient(135deg, #1f1b0e, #3a2e0a); color: var(--gold); }
    .course-cover.indigo { background: linear-gradient(135deg, #111730, #1b2550); color: #7c9ff5; }
    .course-cover.green  { background: linear-gradient(135deg, #0f2218, #183825); color: #5de8a0; }
    .course-body { padding: 24px; }
    .course-level {
      display: inline-block;
      padding: 3px 12px;
      border-radius: 50px;
      font-size: 0.72rem; font-weight: 600; letter-spacing: 1px;
      text-transform: uppercase; margin-bottom: 12px;
    }
    .level-beginner { background: rgba(93,232,160,0.1); color: #5de8a0; }
    .level-elementary { background: rgba(124,159,245,0.1); color: #7c9ff5; }
    .level-intermediate { background: rgba(232,184,109,0.1); color: var(--gold); }
    .level-advanced { background: rgba(232,88,122,0.1); color: var(--cherry2); }
    .course-body h3 {
      font-family: 'Shippori Mincho B1', serif;
      font-size: 1.1rem; font-weight: 700;
      margin-bottom: 8px;
    }
    .course-body p { color: var(--muted); font-size: 0.87rem; line-height: 1.65; margin-bottom: 20px; }
    .course-meta {
      display: flex; justify-content: space-between;
      align-items: center;
      padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.05);
    }
    .course-lessons { font-size: 0.83rem; color: var(--muted); }
    .course-lessons span { color: var(--text); font-weight: 600; }
    .course-arrow {
      width: 34px; height: 34px;
      background: rgba(232,88,122,0.1);
      border: 1px solid var(--border);
      border-radius: 9px;
      display: flex; align-items: center; justify-content: center;
      color: var(--cherry); font-size: 1rem;
      transition: background 0.2s, transform 0.2s;
      cursor: pointer;
    }
    .course-card:hover .course-arrow { background: var(--cherry); color: white; transform: translateX(2px); }

    /* ─── TESTIMONIALS ─── */
    .testimonials-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 22px; margin-top: 56px;
    }
    .testimonial-card {
      background: var(--surface);
      border: 1px solid rgba(255,255,255,0.06);
      border-radius: 20px;
      padding: 32px;
      position: relative;
      transition: transform 0.3s, border-color 0.3s;
    }
    .testimonial-card:hover { transform: translateY(-4px); border-color: var(--border); }
    .quote-mark {
      font-family: 'Shippori Mincho B1', serif;
      font-size: 4rem; color: var(--cherry);
      opacity: 0.3; line-height: 0.6;
      margin-bottom: 16px; display: block;
    }
    .testimonial-text {
      color: #b0b8cc; font-size: 0.95rem; line-height: 1.8;
      margin-bottom: 24px;
    }
    .testimonial-author { display: flex; align-items: center; gap: 14px; }
    .author-avatar {
      width: 44px; height: 44px; border-radius: 50%;
      background: linear-gradient(135deg, var(--cherry), var(--gold));
      display: flex; align-items: center; justify-content: center;
      font-weight: 700; font-size: 1rem; color: white; flex-shrink: 0;
    }
    .author-name { font-weight: 600; font-size: 0.93rem; }
    .author-detail { font-size: 0.8rem; color: var(--muted); }
    .stars { color: var(--gold); font-size: 0.8rem; margin-bottom: 4px; }

    /* ─── PRICING ─── */
    .pricing-section { background: var(--bg2); }
    .pricing-grid {
      display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 24px; margin-top: 56px; align-items: start;
    }
    .pricing-card {
      background: var(--surface);
      border: 1px solid rgba(255,255,255,0.06);
      border-radius: 22px; padding: 36px 32px;
      transition: transform 0.3s;
      position: relative; overflow: hidden;
    }
    .pricing-card.popular {
      border-color: var(--cherry);
      box-shadow: var(--glow);
    }
    .pricing-card.popular::before {
      content: '★ Хамгийн их сонгогддог';
      position: absolute; top: 0; left: 0; right: 0;
      background: linear-gradient(90deg, var(--cherry), #b8305a);
      color: white;
      font-size: 0.75rem; font-weight: 600;
      text-align: center; padding: 6px;
      letter-spacing: 1px;
    }
    .pricing-card.popular .pricing-body { margin-top: 20px; }
    .pricing-card:hover { transform: translateY(-5px); }
    .pricing-plan { font-size: 0.8rem; letter-spacing: 2px; text-transform: uppercase; color: var(--muted); font-weight: 600; margin-bottom: 10px; }
    .pricing-price {
      font-family: 'Shippori Mincho B1', serif;
      font-size: 3rem; font-weight: 800; color: var(--text); line-height: 1;
    }
    .pricing-price sup { font-size: 1.2rem; vertical-align: top; margin-top: 10px; display: inline-block; color: var(--muted); }
    .pricing-price sub { font-size: 0.9rem; color: var(--muted); font-weight: 400; }
    .pricing-desc { color: var(--muted); font-size: 0.87rem; margin: 12px 0 24px; line-height: 1.7; }
    .pricing-features { list-style: none; display: flex; flex-direction: column; gap: 12px; margin-bottom: 32px; }
    .pricing-features li { display: flex; align-items: center; gap: 10px; font-size: 0.9rem; color: #b0b8cc; }
    .pricing-features li::before { content: '✓'; color: var(--cherry); font-weight: 700; flex-shrink: 0; }
    .pricing-features li.disabled { color: var(--muted); opacity: 0.5; }
    .pricing-features li.disabled::before { content: '✕'; color: var(--muted); }
    .btn-plan {
      display: block; text-align: center;
      padding: 14px; border-radius: 12px;
      font-weight: 600; font-size: 0.95rem;
      text-decoration: none;
      transition: all 0.2s;
    }
    .btn-plan-outline {
      border: 1px solid rgba(255,255,255,0.15);
      color: var(--text);
    }
    .btn-plan-outline:hover { border-color: var(--cherry); color: var(--cherry); }
    .btn-plan-fill {
      background: linear-gradient(135deg, var(--cherry), #b8305a);
      color: white;
      box-shadow: 0 4px 20px rgba(232,88,122,0.3);
    }
    .btn-plan-fill:hover { box-shadow: 0 6px 30px rgba(232,88,122,0.5); transform: translateY(-1px); }

    /* ─── CTA BANNER ─── */
    .cta-section { padding: 0 5% 120px; }
    .cta-inner {
      max-width: 1180px; margin: 0 auto;
      background: linear-gradient(135deg, #1a0e18 0%, #1a1030 50%, #0e1820 100%);
      border: 1px solid var(--border);
      border-radius: 28px;
      padding: 80px 60px;
      text-align: center;
      position: relative; overflow: hidden;
    }
    .cta-inner::before {
      content: '学';
      position: absolute; left: -40px; top: -40px;
      font-family: 'Noto Serif JP', serif;
      font-size: 300px; font-weight: 900;
      color: rgba(232,88,122,0.04);
      line-height: 1; pointer-events: none;
    }
    .cta-inner::after {
      content: '習';
      position: absolute; right: -40px; bottom: -60px;
      font-family: 'Noto Serif JP', serif;
      font-size: 300px; font-weight: 900;
      color: rgba(232,184,109,0.04);
      line-height: 1; pointer-events: none;
    }
    .cta-inner h2 {
      font-family: 'Shippori Mincho B1', serif;
      font-size: clamp(1.8rem, 3.5vw, 3rem);
      font-weight: 800; line-height: 1.2;
      margin-bottom: 18px;
    }
    .cta-inner p { color: var(--muted); font-size: 1rem; margin-bottom: 36px; max-width: 500px; margin-inline: auto; margin-bottom: 40px; }
    .cta-actions { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }

    /* ─── FOOTER ─── */
    footer {
      background: var(--bg);
      border-top: 1px solid rgba(255,255,255,0.05);
      padding: 60px 5% 32px;
      position: relative; z-index: 1;
    }
    .footer-inner { max-width: 1180px; margin: 0 auto; }
    .footer-top {
      display: grid; grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 48px; margin-bottom: 48px;
    }
    .footer-brand p { color: var(--muted); font-size: 0.9rem; line-height: 1.75; margin-top: 14px; max-width: 280px; }
    .footer-col h4 {
      font-family: 'Shippori Mincho B1', serif;
      font-size: 0.95rem; font-weight: 700;
      margin-bottom: 18px; color: var(--text);
    }
    .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 10px; }
    .footer-col ul a { color: var(--muted); text-decoration: none; font-size: 0.88rem; transition: color 0.2s; }
    .footer-col ul a:hover { color: var(--cherry2); }
    .footer-bottom {
      display: flex; justify-content: space-between; align-items: center;
      padding-top: 28px; border-top: 1px solid rgba(255,255,255,0.05);
      flex-wrap: wrap; gap: 12px;
    }
    .footer-bottom p { color: var(--muted); font-size: 0.83rem; }
    .footer-socials { display: flex; gap: 12px; }
    .social-btn {
      width: 36px; height: 36px;
      background: var(--surface);
      border: 1px solid rgba(255,255,255,0.07);
      border-radius: 9px;
      display: flex; align-items: center; justify-content: center;
      color: var(--muted); font-size: 0.9rem; text-decoration: none;
      transition: border-color 0.2s, color 0.2s;
    }
    .social-btn:hover { border-color: var(--cherry); color: var(--cherry); }

    /* ─── SCROLL REVEAL ─── */
    .reveal {
      opacity: 0; transform: translateY(32px);
      transition: opacity 0.7s ease, transform 0.7s ease;
    }
    .reveal.visible { opacity: 1; transform: translateY(0); }
    .reveal-delay-1 { transition-delay: 0.1s; }
    .reveal-delay-2 { transition-delay: 0.2s; }
    .reveal-delay-3 { transition-delay: 0.3s; }
    .reveal-delay-4 { transition-delay: 0.4s; }

    /* ─── RESPONSIVE ─── */
    @media (max-width: 900px) {
      .steps-wrap { grid-template-columns: 1fr; }
      .footer-top { grid-template-columns: 1fr 1fr; }
      .nav-links { display: none; }
    }
    @media (max-width: 600px) {
      .hero-stats { gap: 28px; }
      .footer-top { grid-template-columns: 1fr; }
      .cta-inner { padding: 50px 28px; }
    }
  </style>
</head>
<body>

  <!-- SAKURA PETALS -->
  <div class="sakura-bg" aria-hidden="true">
    <div class="petal"></div><div class="petal"></div><div class="petal"></div>
    <div class="petal"></div><div class="petal"></div><div class="petal"></div>
    <div class="petal"></div><div class="petal"></div><div class="petal"></div>
    <div class="petal"></div>
  </div>

  <!-- NAV -->
  <nav>
    <a href="#" class="nav-logo">
      <div class="logo-icon">日</div>
      <div class="logo-wrap">
        <span>Monn<span>ihon</span></span>
        <span class="jp-sub">モンニホン</span>
      </div>
    </a>
    <ul class="nav-links">
      <li><a href="#features">Онцлог</a></li>
      <li><a href="#courses">Хичээлүүд</a></li>
      <li><a href="#how">Яаж суралцах</a></li>
      <li><a href="#pricing">Үнэ</a></li>
      <li><a href="#" class="nav-cta">Үнэгүй эхлэх</a></li>
    </ul>
  </nav>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-radial"></div>
    <div class="hero-kanji-bg" aria-hidden="true">日本語</div>

    <div class="hero-badge">
      <div class="badge-dot"></div>
      Монголчуудад зориулсан №1 японы хэлний платформ
    </div>

    <h1>
      <span class="line1">Японы хэлийг</span>
      <span class="line2">Монголоор сур</span>
    </h1>
    <p class="hero-jp-title">日本語を学ぼう</p>
    <p class="hero-desc">
      Хиригана, катакана, кандзиас эхлээд өдөр тутмын яриа хүртэл — 
      бүх хичээлийг монгол хэл дээр, мэргэжлийн багш нарын удирдлагаар эзэмш.
    </p>
    <div class="hero-actions">
      <a href="#" class="btn-primary">🌸 Үнэгүй эхлэх</a>
      <a href="#courses" class="btn-secondary">▶ Хичээлүүд үзэх</a>
    </div>

    <div class="hero-stats">
      <div class="stat-item">
        <div class="stat-num">12,400+</div>
        <div class="stat-label">Идэвхтэй сурагч</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">320+</div>
        <div class="stat-label">Хичээлийн тоо</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">98%</div>
        <div class="stat-label">Сэтгэл ханамж</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">N5–N1</div>
        <div class="stat-label">JLPT бэлтгэл</div>
      </div>
    </div>
  </section>

  <!-- FEATURES -->
  <section class="features-section" id="features">
    <div class="section-inner">
      <div class="reveal">
        <div class="section-tag">Яагаад Monnihon?</div>
        <h2 class="section-title">Суралцахад <em>хялбар</em>, үр дүнтэй</h2>
        <p class="section-desc">Монголчуудын хувьд тохирсон аргачлал, дасгал болон хяналтын системтэй.</p>
      </div>
      <div class="features-grid">
        <div class="feature-card reveal reveal-delay-1">
          <div class="feature-icon">🇲🇳</div>
          <h3>Монгол хэлээр тайлбар</h3>
          <p>Бүх дүрэм, тайлбар, жишээ өгүүлбэрийг монгол хэл дээр ойлгомжтойгоор бичсэн.</p>
          <div class="feature-jp" aria-hidden="true">説</div>
        </div>
        <div class="feature-card reveal reveal-delay-2">
          <div class="feature-icon">🎧</div>
          <h3>Уугуул дуу авиа</h3>
          <p>Японы уугуул хэлтэй яригчдын дуу бичлэгээр дуудлагаа хурдан сайжруулаарай.</p>
          <div class="feature-jp" aria-hidden="true">声</div>
        </div>
        <div class="feature-card reveal reveal-delay-3">
          <div class="feature-icon">🃏</div>
          <h3>Ухаалаг флэшкард</h3>
          <p>Интервал давталтын систем ашиглан үгсийг богино хугацаанд гүнзгий цээжил.</p>
          <div class="feature-jp" aria-hidden="true">記</div>
        </div>
        <div class="feature-card reveal reveal-delay-1">
          <div class="feature-icon">📊</div>
          <h3>Явцын хяналт</h3>
          <p>Өдөр тутмын суралцалтаа график хэлбэрээр хянаж, зорилгодоо хүрэх замаа харж байгаарай.</p>
          <div class="feature-jp" aria-hidden="true">進</div>
        </div>
        <div class="feature-card reveal reveal-delay-2">
          <div class="feature-icon">✍️</div>
          <h3>Бичих дасгалжуулагч</h3>
          <p>Хиригана, катакана болон кандзи тэмдэгтийг зөв дэс дарааллаар бичих дадлага хий.</p>
          <div class="feature-jp" aria-hidden="true">書</div>
        </div>
        <div class="feature-card reveal reveal-delay-3">
          <div class="feature-icon">🏆</div>
          <h3>JLPT бэлтгэл</h3>
          <p>N5-с N1 хүртэлх бүх түвшний шалгалтад зориулсан тусгай хичээл, дасгал.</p>
          <div class="feature-jp" aria-hidden="true">試</div>
        </div>
      </div>
    </div>
  </section>

  <!-- HOW IT WORKS -->
  <section id="how">
    <div class="section-inner">
      <div class="steps-wrap">
        <div>
          <div class="reveal">
            <div class="section-tag">Яаж ажилладаг вэ</div>
            <h2 class="section-title">4 алхамд <em>суралцаж</em> эхэл</h2>
            <p class="section-desc">Энгийн бүртгэлээс эхлээд жинхэнэ яриа хүртэл — зам нь тодорхой.</p>
          </div>
          <div class="steps-list" style="margin-top:40px">
            <div class="step-item reveal reveal-delay-1">
              <div class="step-num">1</div>
              <div class="step-content">
                <h4>Бүртгүүлж, түвшнээ тодорхойл</h4>
                <p>Богино оношилгоо тестэнд хамрагдаж, одоогийн түвшиндээ тохирсон хичээлийн эхлэлийн цэгийг тогтоо.</p>
              </div>
            </div>
            <div class="step-item reveal reveal-delay-2">
              <div class="step-num">2</div>
              <div class="step-content">
                <h4>Өдөр тутмын хичээлтэйгээ уулз</h4>
                <p>AI-д суурилсан систем тань хамгийн их дутагдаж буй хэсэгт тань дасгалыг нэмж өгдөг.</p>
              </div>
            </div>
            <div class="step-item reveal reveal-delay-3">
              <div class="step-num">3</div>
              <div class="step-content">
                <h4>Дасгал, шалгалтаар бататга</h4>
                <p>Дуулах, унших, бичих, ярих — дөрвөн ур чадварыг хамт хөгжүүл.</p>
              </div>
            </div>
            <div class="step-item reveal reveal-delay-4">
              <div class="step-num">4</div>
              <div class="step-content">
                <h4>Гэрчилгээгээ аваарай</h4>
                <p>Түвшин бүрийг амжилттай дуусгасны дараа баталгаажуулсан гэрчилгээ олгодог.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="steps-visual reveal reveal-delay-2">
          <div class="level-badges">
            <span class="level-badge active">N5 — Анхан</span>
            <span class="level-badge">N4</span>
            <span class="level-badge">N3</span>
            <span class="level-badge">N2</span>
            <span class="level-badge">N1</span>
          </div>
          <div style="text-align:left; margin-bottom:10px;">
            <span style="font-size:0.8rem; color:var(--muted)">Хиригана хүснэгт</span>
          </div>
          <div class="hiragana-chart">
            <div class="kana-cell"><div class="jp">あ</div><div class="ro">a</div></div>
            <div class="kana-cell"><div class="jp">い</div><div class="ro">i</div></div>
            <div class="kana-cell"><div class="jp">う</div><div class="ro">u</div></div>
            <div class="kana-cell"><div class="jp">え</div><div class="ro">e</div></div>
            <div class="kana-cell"><div class="jp">お</div><div class="ro">o</div></div>
            <div class="kana-cell"><div class="jp">か</div><div class="ro">ka</div></div>
            <div class="kana-cell"><div class="jp">き</div><div class="ro">ki</div></div>
            <div class="kana-cell"><div class="jp">く</div><div class="ro">ku</div></div>
            <div class="kana-cell"><div class="jp">け</div><div class="ro">ke</div></div>
            <div class="kana-cell"><div class="jp">こ</div><div class="ro">ko</div></div>
            <div class="kana-cell"><div class="jp">さ</div><div class="ro">sa</div></div>
            <div class="kana-cell"><div class="jp">し</div><div class="ro">shi</div></div>
            <div class="kana-cell"><div class="jp">す</div><div class="ro">su</div></div>
            <div class="kana-cell"><div class="jp">せ</div><div class="ro">se</div></div>
            <div class="kana-cell"><div class="jp">そ</div><div class="ro">so</div></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- COURSES -->
  <section class="courses-section" id="courses">
    <div class="section-inner">
      <div class="courses-header">
        <div class="reveal">
          <div class="section-tag">Хичээлүүд</div>
          <h2 class="section-title">Танд <em>тохирсон</em> хөтөлбөр</h2>
        </div>
        <a href="#" class="btn-secondary reveal" style="white-space:nowrap">Бүгдийг харах →</a>
      </div>
      <div class="courses-grid">
        <div class="course-card reveal reveal-delay-1">
          <div class="course-cover pink">あ</div>
          <div class="course-body">
            <span class="course-level level-beginner">Анхан шат</span>
            <h3>Хиригана & Катакана</h3>
            <p>Японы цагаан толгойг дуусгах суурь хичээл. Тэмдэгт бүрийг дуудлага, бичлэгтэй нь сур.</p>
            <div class="course-meta">
              <div class="course-lessons"><span>24</span> хичээл · <span>8</span> дасгал</div>
              <div class="course-arrow">→</div>
            </div>
          </div>
        </div>
        <div class="course-card reveal reveal-delay-2">
          <div class="course-cover indigo">漢</div>
          <div class="course-body">
            <span class="course-level level-elementary">Дунд доод</span>
            <h3>JLPT N5 Бэлтгэл</h3>
            <p>103 кандзи, 800 үг, үндсэн дүрэм — N5 шалгалтын бүрэн бэлтгэлийн хөтөлбөр.</p>
            <div class="course-meta">
              <div class="course-lessons"><span>48</span> хичээл · <span>20</span> дасгал</div>
              <div class="course-arrow">→</div>
            </div>
          </div>
        </div>
        <div class="course-card reveal reveal-delay-3">
          <div class="course-cover gold">話</div>
          <div class="course-body">
            <span class="course-level level-intermediate">Дунд шат</span>
            <h3>Өдөр тутмын яриа</h3>
            <p>Япон улсад амьдрах, ажиллахад шаардлагатай бодит харилцааны хичээлүүд.</p>
            <div class="course-meta">
              <div class="course-lessons"><span>36</span> хичээл · <span>15</span> дасгал</div>
              <div class="course-arrow">→</div>
            </div>
          </div>
        </div>
        <div class="course-card reveal reveal-delay-4">
          <div class="course-cover green">敬</div>
          <div class="course-body">
            <span class="course-level level-advanced">Дэвшилтэт</span>
            <h3>JLPT N2 Бэлтгэл</h3>
            <p>1,000+ кандзи, нарийн дүрэм, ажил хэрэг яриа — N2 шалгалтын бүрэн бэлтгэл.</p>
            <div class="course-meta">
              <div class="course-lessons"><span>72</span> хичээл · <span>35</span> дасгал</div>
              <div class="course-arrow">→</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section>
    <div class="section-inner">
      <div class="reveal" style="text-align:center; max-width:600px; margin:0 auto 0">
        <div class="section-tag" style="justify-content:center">Сурагчдын сэтгэгдэл</div>
        <h2 class="section-title">Тэд аль хэдийн <em>амжилт</em> олсон</h2>
      </div>
      <div class="testimonials-grid">
        <div class="testimonial-card reveal reveal-delay-1">
          <span class="quote-mark">"</span>
          <p class="testimonial-text">Monnihon-ийн хичээлүүдийг 6 сар судалсны дараа JLPT N4 шалгалтыг амжилттай давлаа. Монгол хэлээр тайлбарлах нь маш их тусалдаг!</p>
          <div class="testimonial-author">
            <div class="author-avatar">Б</div>
            <div>
              <div class="stars">★★★★★</div>
              <div class="author-name">Болд-Эрдэнэ Д.</div>
              <div class="author-detail">Улаанбаатар · N4 шалгалт тэнцсэн</div>
            </div>
          </div>
        </div>
        <div class="testimonial-card reveal reveal-delay-2">
          <span class="quote-mark">"</span>
          <p class="testimonial-text">Японд ажиллахаар шийдсэний дараа энд бүртгүүлсэн. 8 сарын дотор N3 авч, Токиод ажилд орлоо. Баярлалаа Monnihon!</p>
          <div class="testimonial-author">
            <div class="author-avatar">О</div>
            <div>
              <div class="stars">★★★★★</div>
              <div class="author-name">Оюун-Эрдэнэ Г.</div>
              <div class="author-detail">Токио, Япон · N3 эзэмшсэн</div>
            </div>
          </div>
        </div>
        <div class="testimonial-card reveal reveal-delay-3">
          <span class="quote-mark">"</span>
          <p class="testimonial-text">Флэшкард систем нь хамгийн дуртай хэсэг. Автобусанд явж байхдаа ч сурч болдог. Хиригана, катаканаг 2 долоо хоногт цээжлэлээ.</p>
          <div class="testimonial-author">
            <div class="author-avatar">Н</div>
            <div>
              <div class="stars">★★★★★</div>
              <div class="author-name">Нарантуяа М.</div>
              <div class="author-detail">Дархан · Оюутан</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PRICING -->
  <section class="pricing-section" id="pricing">
    <div class="section-inner">
      <div class="reveal" style="text-align:center; max-width:560px; margin:0 auto 0">
        <div class="section-tag" style="justify-content:center">Үнийн санал</div>
        <h2 class="section-title">Зорилгодоо <em>тохирсон</em> багц сонго</h2>
        <p class="section-desc" style="margin:0 auto">Бүх багц 7 хоногийн туршилт хугацаатай. Картын мэдээлэл шаардахгүй.</p>
      </div>
      <div class="pricing-grid">
        <div class="pricing-card reveal reveal-delay-1">
          <div class="pricing-plan">Үнэгүй</div>
          <div class="pricing-price">₮0 <sub>/сар</sub></div>
          <p class="pricing-desc">Туршиж үзэхэд хамгийн тохиромжтой. Суурь хичээлүүд нээлттэй.</p>
          <ul class="pricing-features">
            <li>N5 суурь хичээлүүд</li>
            <li>Хиригана & Катакана хичээл</li>
            <li>50 флэшкард/өдөр</li>
            <li class="disabled">Дуу бичлэг хандах</li>
            <li class="disabled">JLPT дасгал шалгалт</li>
            <li class="disabled">Гэрчилгээ</li>
          </ul>
          <a href="#" class="btn-plan btn-plan-outline">Үнэгүй эхлэх</a>
        </div>
        <div class="pricing-card popular reveal reveal-delay-2">
          <div class="pricing-body">
            <div class="pricing-plan">Стандарт</div>
            <div class="pricing-price"><sup>₮</sup>29,900 <sub>/сар</sub></div>
            <p class="pricing-desc">Хамгийн их сонгогддог. Бүрэн суралцах орчин.</p>
            <ul class="pricing-features">
              <li>Бүх N5–N3 хичээл</li>
              <li>Хязгааргүй флэшкард</li>
              <li>Дуу бичлэгийн сан</li>
              <li>JLPT дасгал шалгалт</li>
              <li>Явцын аналитик</li>
              <li class="disabled">Хувийн зөвлөх багш</li>
            </ul>
            <a href="#" class="btn-plan btn-plan-fill">Эхлэх →</a>
          </div>
        </div>
        <div class="pricing-card reveal reveal-delay-3">
          <div class="pricing-plan">Мэргэжлийн</div>
          <div class="pricing-price"><sup>₮</sup>59,900 <sub>/сар</sub></div>
          <p class="pricing-desc">Япон руу нүүх эсвэл JLPT N2/N1 зорьж буй хүмүүст.</p>
          <ul class="pricing-features">
            <li>Бүх N5–N1 хичээл</li>
            <li>Хязгааргүй флэшкард</li>
            <li>Дуу бичлэгийн сан</li>
            <li>Бүх JLPT дасгалууд</li>
            <li>Хувийн зөвлөх багш</li>
            <li>Мэргэжлийн гэрчилгээ</li>
          </ul>
          <a href="#" class="btn-plan btn-plan-outline">Эхлэх →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <div class="cta-section">
    <div class="cta-inner reveal">
      <h2>Японы хэлний аялалаа<br><em style="color:var(--cherry)">өнөөдрөөс</em> эхэл</h2>
      <p>12,000 гаруй монгол сурагчтай нэгд. Хандив, шимтгэлгүй — 7 хоnog үнэгүй туршаарай.</p>
      <div class="cta-actions">
        <a href="#" class="btn-primary">🌸 Үнэгүй бүртгүүлэх</a>
        <a href="#courses" class="btn-secondary">Хичээлүүд харах</a>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    <div class="footer-inner">
      <div class="footer-top">
        <div class="footer-brand">
          <a href="#" class="nav-logo" style="text-decoration:none">
            <div class="logo-icon">日</div>
            <div class="logo-wrap">
              <span style="font-family:'Shippori Mincho B1',serif;font-size:1.3rem;font-weight:800;color:var(--text)">Monn<span style="color:var(--cherry)">ihon</span></span>
              <span style="font-size:0.7rem;color:var(--muted);letter-spacing:3px;font-family:'Noto Serif JP',serif">モンニホン</span>
            </div>
          </a>
          <p>Монголчуудад зориулсан хамгийн дэлгэрэнгүй, хялбар, хурдан японы хэлний платформ.</p>
        </div>
        <div class="footer-col">
          <h4>Платформ</h4>
          <ul>
            <li><a href="#">Хичээлүүд</a></li>
            <li><a href="#">Флэшкард</a></li>
            <li><a href="#">JLPT Бэлтгэл</a></li>
            <li><a href="#">Гэрчилгээ</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Компани</h4>
          <ul>
            <li><a href="#">Бидний тухай</a></li>
            <li><a href="#">Блог</a></li>
            <li><a href="#">Ажлын байр</a></li>
            <li><a href="#">Холбоо барих</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Тусламж</h4>
          <ul>
            <li><a href="#">Түгээмэл асуулт</a></li>
            <li><a href="#">Нийгэмлэг</a></li>
            <li><a href="#">Нэвтрэх</a></li>
            <li><a href="#">Бүртгүүлэх</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© 2025 Monnihon. Бүх эрх хуулиар хамгаалагдсан.</p>
        <div class="footer-socials">
          <a href="#" class="social-btn" title="Facebook">f</a>
          <a href="#" class="social-btn" title="Instagram" style="font-style:italic">in</a>
          <a href="#" class="social-btn" title="YouTube">▶</a>
          <a href="#" class="social-btn" title="Discord">◈</a>
        </div>
      </div>
    </div>
  </footer>

  <script>
    // Scroll reveal
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('visible'); }
      });
    }, { threshold: 0.12 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // Nav scroll effect
    window.addEventListener('scroll', () => {
      const nav = document.querySelector('nav');
      nav.style.background = window.scrollY > 60
        ? 'rgba(7,9,15,0.95)'
        : 'rgba(7,9,15,0.75)';
    });
  </script>
</body>
</html>