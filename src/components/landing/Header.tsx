import { useState, useEffect } from "react";
import { Button } from "@/components/ui/button";
import { Phone } from "lucide-react";
import { cn } from "@/lib/utils";
import { Link } from "react-router-dom";

const Header = () => {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 80);
    };
    
    window.addEventListener("scroll", handleScroll, { passive: true });
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const navItems = [
    { label: "صفحه اصلی", href: "/" },
    { label: "محصولات", href: "/#products" },
    { label: "درباره ما", href: "/#about" },
    { label: "تماس با ما", href: "/#contact" },
  ];

  return (
    <>
      {/* Spacer */}
      <div className={cn(
        "transition-all duration-300 ease-out",
        isScrolled ? "h-0" : "h-20"
      )} />

      <header
        className={cn(
          "fixed z-50 transition-all duration-300 ease-out",
          isScrolled 
            ? "top-3 left-4 right-4 mx-auto max-w-5xl rounded-2xl bg-[#121212]/90 backdrop-blur-xl border border-white/10 shadow-2xl" 
            : "top-0 left-0 right-0 bg-[#121212]/80 backdrop-blur-xl border-b border-white/5"
        )}
      >
        <div className={cn(
          "transition-all duration-300 ease-out",
          isScrolled ? "px-6" : "container mx-auto px-4"
        )}>
          <div className={cn(
            "flex items-center justify-between transition-all duration-300 ease-out",
            isScrolled ? "h-14" : "h-20"
          )}>
            {/* Logo */}
            <Link 
              to="/" 
              className={cn(
                "font-bold text-primary transition-all duration-300 hover:opacity-80",
                isScrolled ? "text-lg" : "text-2xl"
              )}
            >
              شیائومی ساری
            </Link>

            {/* Desktop Navigation */}
            <nav className="hidden md:flex items-center gap-6">
              {navItems.map((item, index) => (
                <Link 
                  key={index}
                  to={item.href} 
                  className="text-foreground hover:text-primary transition-colors duration-200 font-medium"
                >
                  {item.label}
                </Link>
              ))}
            </nav>

            {/* CTA */}
            <div className="hidden md:flex items-center gap-3">
              <a href="tel:01133333333" className="flex items-center gap-2 text-muted-foreground hover:text-primary transition-colors">
                <Phone className="w-4 h-4" />
                <span className={cn(
                  "transition-all duration-300",
                  isScrolled ? "text-xs" : "text-sm"
                )}>
                  ۰۱۱-۳۳۳۳۳۳۳۳
                </span>
              </a>
              <Button 
                variant="default" 
                size={isScrolled ? "sm" : "default"}
                className="rounded-xl"
              >
                تماس با ما
              </Button>
            </div>

            {/* Mobile Menu Toggle */}
            <button
              className="md:hidden p-2 rounded-xl hover:bg-white/10 transition-colors"
              onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
            >
              <div className="relative w-6 h-6">
                <span className={cn(
                  "absolute left-0 w-6 h-0.5 bg-foreground transition-all duration-300",
                  isMobileMenuOpen ? "top-3 rotate-45" : "top-1"
                )} />
                <span className={cn(
                  "absolute top-3 left-0 w-6 h-0.5 bg-foreground transition-all duration-300",
                  isMobileMenuOpen && "opacity-0"
                )} />
                <span className={cn(
                  "absolute left-0 w-6 h-0.5 bg-foreground transition-all duration-300",
                  isMobileMenuOpen ? "top-3 -rotate-45" : "top-5"
                )} />
              </div>
            </button>
          </div>

          {/* Mobile Menu */}
          <div className={cn(
            "md:hidden overflow-hidden transition-all duration-300",
            isMobileMenuOpen ? "max-h-64 pb-4" : "max-h-0"
          )}>
            <nav className="flex flex-col gap-1">
              {navItems.map((item, index) => (
                <Link
                  key={index}
                  to={item.href}
                  className="text-foreground hover:text-primary hover:bg-white/5 transition-colors font-medium px-4 py-3 rounded-xl"
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
