<?php
// Konfigurasi dasar untuk situs
$site_title = "Roseno.Store Portfolio";
$logo_url = "https://storage.googleapis.com/a1aa/image/6c1a5434-68bf-4c8d-087b-74dc2067014f.jpg";
$biography = ".";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title><?php echo $site_title; ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap');
    /* ...existing code... */

    /* LOADING OVERLAY */
    #loading-overlay {
      position: fixed;
      z-index: 9999;
      inset: 0;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: opacity 0.6s cubic-bezier(.4,0,.2,1);
    }
    #loading-overlay.hide {
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.6s cubic-bezier(.4,0,.2,1);
    }
    .glass-wipe {
      position: relative;
      width: 220px;
      height: 220px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .glass-wipe .logo {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #6366f1;
      z-index: 2;
      background: #fff;
      box-shadow: 0 4px 24px rgba(99,102,241,0.08);
    }
    .glass-wipe .wipe {
      position: absolute;
      left: 50%;
      top: 50%;
      width: 180px;
      height: 32px;
      background: linear-gradient(120deg, rgba(99,102,241,0.12) 0%, rgba(99,102,241,0.25) 100%);
      border-radius: 24px;
      transform: translate(-50%, -50%) rotate(-24deg) scaleX(0.7);
      box-shadow: 0 2px 16px rgba(99,102,241,0.10);
      overflow: hidden;
      z-index: 3;
      animation: wipe-glass 1.7s cubic-bezier(.4,0,.2,1) forwards;
    }
    @keyframes wipe-glass {
      0% {
        left: -60%;
        opacity: 0.7;
      }
      20% {
        opacity: 1;
      }
      60% {
        left: 50%;
        opacity: 1;
      }
      100% {
        left: 120%;
        opacity: 0;
      }
    }
    .glass-wipe .shine {
      position: absolute;
      left: 50%;
      top: 50%;
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background: linear-gradient(120deg, rgba(255,255,255,0.25) 0%, rgba(255,255,255,0.05) 100%);
      transform: translate(-50%, -50%);
      z-index: 1;
      pointer-events: none;
      animation: shine-glass 1.7s cubic-bezier(.4,0,.2,1) forwards;
    }
    @keyframes shine-glass {
      0% { opacity: 0.2; }
      40% { opacity: 0.5; }
      100% { opacity: 0.2; }
    }
    /* ...existing code... */
  </style>
</head>
<body>
  <!-- LOADING OVERLAY -->
  <div id="loading-overlay">
    <div class="glass-wipe">
      <img src="<?php echo $logo_url; ?>" alt="Logo" class="logo" />
      <div class="wipe"></div>
      <div class="shine"></div>
    </div>
  </div>
  <!-- Overlay for mobile menu -->
  <div class="overlay" id="overlay"></div>
  <!-- ...existing code... -->
  <header class="bg-gray-900 bg-opacity-90 backdrop-blur-md shadow-md sticky top-0 z-50">
    <!-- ...existing code... -->
  </header>
  <main id="home" class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6 py-20 gap-16 md:gap-32">
    <!-- ...existing code... -->
  </main>
  <!-- ...existing code... -->
  <footer class="bg-gray-900 text-white py-12 mt-20">
    <!-- ...existing code... -->
  </footer>
  <script>
    // LOADING OVERLAY LOGIC
    window.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
        document.getElementById('loading-overlay').classList.add('hide');
        setTimeout(function() {
          document.getElementById('loading-overlay').style.display = 'none';
        }, 700);
      }, 1700); // match animation duration
    });

    // ...existing code...
    // Mobile menu toggle
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.querySelector('.nav-links');
    const overlay = document.getElementById('overlay');
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('active');
      navLinks.classList.toggle('active');
      overlay.classList.toggle('active');
      document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : 'auto';
    });
    overlay.addEventListener('click', () => {
      hamburger.classList.remove('active');
      navLinks.classList.remove('active');
      overlay.classList.remove('active');
      document.body.style.overflow = 'auto';
    });
    document.querySelectorAll('.nav-links a').forEach(link => {
      link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navLinks.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = 'auto';
      });
    });
    // Add animation to elements when they come into view
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-in');
        }
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('.animate-layout').forEach(el => {
      observer.observe(el);
    });
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - 80,
            behavior: 'smooth'
          });
        }
      });
    });
  </script>
</body>
</html>