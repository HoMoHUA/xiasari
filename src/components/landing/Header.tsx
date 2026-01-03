import { useState, useEffect } from "react";
import { Button } from "@/components/ui/button";
import { Menu, X, Phone, Sun, Moon } from "lucide-react";
import { useTheme } from "next-themes";
import { cn } from "@/lib/utils";
import { Link } from "react-router-dom";

const Header = () => {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
  const { theme, setTheme } = useTheme();
  const [mounted, setMounted] = useState(false);

  useEffect(() => {
    setMounted(true);
  }, []);

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 100);
    };
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const toggleTheme = () => {
    setTheme(theme === "dark" ? "light" : "dark");
  };

  return (
    <>
      {/* Spacer for normal header */}
      <div className={cn(
        "transition-all duration-700",
        isScrolled ? "h-0" : "h-24"
      )} />

      <header
        className={cn(
          "fixed z-50 transition-all duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]",
          isScrolled
            ? "top-4 left-1/2 -translate-x-1/2 w-[calc(100%-2rem)] max-w-5xl rounded-2xl bg-background/50 backdrop-blur-2xl border border-border/30 shadow-2xl"
            : "top-0 left-0 right-0 bg-background/70 backdrop-blur-xl border-b border-border/20"
        )}
        style={{
          boxShadow: isScrolled 
            ? '0 8px 32px rgba(0,0,0,0.2), inset 0 1px 0 rgba(255,255,255,0.05)' 
            : 'none'
        }}
      >
        {/* Live blur overlay */}
        <div className="absolute inset-0 live-blur rounded-inherit pointer-events-none" />

        <div className={cn(
          "relative z-10 transition-all duration-700",
          isScrolled ? "px-6" : "container mx-auto px-4"
        )}>
          <div className={cn(
            "flex items-center justify-between transition-all duration-700",
            isScrolled ? "h-14" : "h-20"
          )}>
            {/* Logo */}
            <Link 
              to="/" 
              className={cn(
                "font-bold text-primary transition-all duration-500 hover:scale-105",
                isScrolled ? "text-lg" : "text-2xl"
              )}
            >
              <span className="relative">
                شیائومی ساری
                <span className="absolute -bottom-1 left-0 right-0 h-0.5 bg-primary/30 scale-x-0 group-hover:scale-x-100 transition-transform duration-300" />
              </span>
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
                  className="relative text-foreground hover:text-primary transition-all duration-300 font-medium group py-2"
                >
                  {item.label}
                  <span className="absolute bottom-0 right-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full rounded-full" />
                </Link>
              ))}
            </nav>

            {/* CTA Button & Theme Toggle */}
            <div className="hidden md:flex items-center gap-3">
              {/* Theme Toggle */}
              {mounted && (
                <button
                  onClick={toggleTheme}
                  className={cn(
                    "relative rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 overflow-hidden group",
                    isScrolled ? "w-9 h-9" : "w-10 h-10",
                    "bg-secondary/50 hover:bg-secondary"
                  )}
                  aria-label="تغییر تم"
                >
                  <div className="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                  {theme === "dark" ? (
                    <Sun className="w-5 h-5 text-foreground group-hover:rotate-180 transition-transform duration-500" />
                  ) : (
                    <Moon className="w-5 h-5 text-foreground group-hover:-rotate-12 transition-transform duration-300" />
                  )}
                </button>
              )}
              
              <a href="tel:01133333333" className="flex items-center gap-2 text-muted-foreground hover:text-primary transition-colors">
                <Phone className="w-4 h-4" />
                <span className={cn("transition-all duration-300", isScrolled ? "text-xs" : "text-sm")}>
                  ۰۱۱-۳۳۳۳۳۳۳۳
                </span>
              </a>
              <Button 
                variant="default" 
                size={isScrolled ? "sm" : "default"}
                className="rounded-xl transition-all duration-300 hover:scale-105 animate-pulse-glow"
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
                <span className={cn(
                  "absolute top-1 left-0 w-6 h-0.5 bg-foreground transition-all duration-300",
                  isMobileMenuOpen && "rotate-45 top-3"
                )} />
                <span className={cn(
                  "absolute top-3 left-0 w-6 h-0.5 bg-foreground transition-all duration-300",
                  isMobileMenuOpen && "opacity-0"
                )} />
                <span className={cn(
                  "absolute top-5 left-0 w-6 h-0.5 bg-foreground transition-all duration-300",
                  isMobileMenuOpen && "-rotate-45 top-3"
                )} />
              </div>
            </button>
          </div>

          {/* Mobile Menu */}
          <div
            className={cn(
              "md:hidden overflow-hidden transition-all duration-500 ease-out",
              isMobileMenuOpen ? "max-h-96 pb-4 opacity-100" : "max-h-0 opacity-0"
            )}
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
                  style={{ animationDelay: `${index * 50}ms` }}
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
