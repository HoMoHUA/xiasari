import { useState, useEffect } from "react";
import { Button } from "@/components/ui/button";
import { Phone } from "lucide-react";
import { cn } from "@/lib/utils";
import { Link } from "react-router-dom";

const Header = () => {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
  const [headerState, setHeaderState] = useState<'normal' | 'transitioning' | 'scrolled'>('normal');

  useEffect(() => {
    const handleScroll = () => {
      const scrolled = window.scrollY > 100;
      
      if (scrolled !== isScrolled) {
        setHeaderState('transitioning');
        setIsScrolled(scrolled);
        
        // Reset transitioning state after animation completes
        setTimeout(() => {
          setHeaderState(scrolled ? 'scrolled' : 'normal');
        }, 600);
      }
    };
    
    window.addEventListener("scroll", handleScroll, { passive: true });
    return () => window.removeEventListener("scroll", handleScroll);
  }, [isScrolled]);

  return (
    <>
      {/* Spacer for normal header */}
      <div 
        className="transition-all ease-out"
        style={{
          height: isScrolled ? 0 : 80,
          transitionDuration: '600ms',
          transitionTimingFunction: 'cubic-bezier(0.34, 1.56, 0.64, 1)'
        }}
      />

      <header
        className={cn(
          "fixed z-50",
          headerState === 'transitioning' && "transition-none"
        )}
        style={{
          top: isScrolled ? 16 : 0,
          left: isScrolled ? '50%' : 0,
          right: isScrolled ? 'auto' : 0,
          transform: isScrolled ? 'translateX(-50%)' : 'none',
          width: isScrolled ? 'calc(100% - 2rem)' : '100%',
          maxWidth: isScrolled ? '64rem' : 'none',
          borderRadius: isScrolled ? '1rem' : 0,
          background: isScrolled 
            ? 'rgba(18, 18, 18, 0.7)' 
            : 'rgba(18, 18, 18, 0.8)',
          backdropFilter: 'blur(24px) saturate(180%)',
          WebkitBackdropFilter: 'blur(24px) saturate(180%)',
          border: isScrolled 
            ? '1px solid rgba(255, 255, 255, 0.1)' 
            : 'none',
          borderBottom: isScrolled 
            ? 'none' 
            : '1px solid rgba(255, 255, 255, 0.05)',
          boxShadow: isScrolled 
            ? '0 8px 32px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.05) inset' 
            : 'none',
          transition: 'all 600ms cubic-bezier(0.34, 1.56, 0.64, 1)',
        }}
      >
        <div 
          className="relative z-10"
          style={{
            padding: isScrolled ? '0 1.5rem' : '0 1rem',
            maxWidth: isScrolled ? 'none' : '1280px',
            margin: '0 auto',
            transition: 'all 600ms cubic-bezier(0.34, 1.56, 0.64, 1)',
          }}
        >
          <div 
            className="flex items-center justify-between"
            style={{
              height: isScrolled ? 56 : 80,
              transition: 'all 600ms cubic-bezier(0.34, 1.56, 0.64, 1)',
            }}
          >
            {/* Logo */}
            <Link 
              to="/" 
              className="font-bold text-primary hover:scale-105 transition-transform duration-300"
              style={{
                fontSize: isScrolled ? '1.125rem' : '1.5rem',
                transition: 'font-size 600ms cubic-bezier(0.34, 1.56, 0.64, 1)',
              }}
            >
              شیائومی ساری
            </Link>

            {/* Desktop Navigation */}
            <nav className="hidden md:flex items-center gap-6">
              {[
                { label: "صفحه اصلی", href: "/" },
                { label: "محصولات", href: "/#products" },
                { label: "درباره ما", href: "/#about" },
                { label: "تماس با ما", href: "/#contact" },
              ].map((item, index) => (
                <Link 
                  key={index}
                  to={item.href} 
                  className="relative text-foreground hover:text-primary transition-colors duration-300 font-medium group py-2"
                >
                  {item.label}
                  <span className="absolute bottom-0 right-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full rounded-full" />
                </Link>
              ))}
            </nav>

            {/* CTA Button */}
            <div className="hidden md:flex items-center gap-3">
              <a href="tel:01133333333" className="flex items-center gap-2 text-muted-foreground hover:text-primary transition-colors">
                <Phone className="w-4 h-4" />
                <span 
                  className="transition-all duration-300"
                  style={{
                    fontSize: isScrolled ? '0.75rem' : '0.875rem',
                    transition: 'font-size 600ms cubic-bezier(0.34, 1.56, 0.64, 1)',
                  }}
                >
                  ۰۱۱-۳۳۳۳۳۳۳۳
                </span>
              </a>
              <Button 
                variant="default" 
                size={isScrolled ? "sm" : "default"}
                className="rounded-xl hover:scale-105"
              >
                تماس با ما
              </Button>
            </div>

            {/* Mobile Menu Toggle */}
            <button
              className="md:hidden p-2 rounded-xl hover:bg-secondary/50 transition-all duration-300 hover:scale-110"
              onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
            >
              <div className="relative w-6 h-6">
                <span 
                  className="absolute left-0 w-6 h-0.5 bg-foreground transition-all duration-300"
                  style={{
                    top: isMobileMenuOpen ? 12 : 4,
                    transform: isMobileMenuOpen ? 'rotate(45deg)' : 'none',
                  }}
                />
                <span 
                  className="absolute top-3 left-0 w-6 h-0.5 bg-foreground transition-all duration-300"
                  style={{
                    opacity: isMobileMenuOpen ? 0 : 1,
                  }}
                />
                <span 
                  className="absolute left-0 w-6 h-0.5 bg-foreground transition-all duration-300"
                  style={{
                    top: isMobileMenuOpen ? 12 : 20,
                    transform: isMobileMenuOpen ? 'rotate(-45deg)' : 'none',
                  }}
                />
              </div>
            </button>
          </div>

          {/* Mobile Menu */}
          <div
            className="md:hidden overflow-hidden"
            style={{
              maxHeight: isMobileMenuOpen ? 400 : 0,
              opacity: isMobileMenuOpen ? 1 : 0,
              paddingBottom: isMobileMenuOpen ? 16 : 0,
              transition: 'all 400ms cubic-bezier(0.34, 1.56, 0.64, 1)',
            }}
          >
            <nav className="flex flex-col gap-1">
              {[
                { label: "صفحه اصلی", href: "/" },
                { label: "محصولات", href: "/#products" },
                { label: "درباره ما", href: "/#about" },
                { label: "تماس با ما", href: "/#contact" },
              ].map((item, index) => (
                <Link
                  key={index}
                  to={item.href}
                  className="text-foreground hover:text-primary hover:bg-primary/5 transition-all duration-300 font-medium px-4 py-3 rounded-xl"
                  onClick={() => setIsMobileMenuOpen(false)}
                >
                  {item.label}
                </Link>
              ))}
            </nav>
          </div>
        </div>
      </header>
    </>
  );
};

export default Header;
