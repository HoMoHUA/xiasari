import { useState, useEffect } from "react";
import { Button } from "@/components/ui/button";
import { Menu, X, Phone, Sun, Moon } from "lucide-react";
import { useTheme } from "next-themes";
import { cn } from "@/lib/utils";

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
    <header
      className={cn(
        "fixed top-0 right-0 left-0 z-50 transition-all duration-500 ease-out",
        isScrolled
          ? "top-4 right-4 left-4 mx-auto max-w-6xl rounded-2xl glass-effect shadow-lg"
          : "glass-effect"
      )}
    >
      <div className={cn(
        "transition-all duration-500",
        isScrolled ? "px-6" : "container mx-auto px-4"
      )}>
        <div className={cn(
          "flex items-center justify-between transition-all duration-500",
          isScrolled ? "h-16" : "h-20"
        )}>
          {/* Logo */}
          <a 
            href="#" 
            className={cn(
              "font-bold text-primary transition-all duration-300",
              isScrolled ? "text-xl" : "text-2xl"
            )}
          >
            شیائومی ساری
          </a>

          {/* Desktop Navigation */}
          <nav className="hidden md:flex items-center gap-8">
            <a href="#" className="text-foreground hover:text-primary transition-colors font-medium relative group">
              صفحه اصلی
              <span className="absolute bottom-0 right-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full" />
            </a>
            <a href="#products" className="text-foreground hover:text-primary transition-colors font-medium relative group">
              محصولات
              <span className="absolute bottom-0 right-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full" />
            </a>
            <a href="#about" className="text-foreground hover:text-primary transition-colors font-medium relative group">
              درباره ما
              <span className="absolute bottom-0 right-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full" />
            </a>
            <a href="#contact" className="text-foreground hover:text-primary transition-colors font-medium relative group">
              تماس با ما
              <span className="absolute bottom-0 right-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full" />
            </a>
          </nav>

          {/* CTA Button & Theme Toggle */}
          <div className="hidden md:flex items-center gap-4">
            {/* Theme Toggle */}
            {mounted && (
              <button
                onClick={toggleTheme}
                className="w-10 h-10 rounded-full bg-secondary flex items-center justify-center hover:bg-secondary/80 transition-colors"
                aria-label="تغییر تم"
              >
                {theme === "dark" ? (
                  <Sun className="w-5 h-5 text-foreground" />
                ) : (
                  <Moon className="w-5 h-5 text-foreground" />
                )}
              </button>
            )}
            
            <a href="tel:01133333333" className="flex items-center gap-2 text-muted-foreground hover:text-primary transition-colors">
              <Phone className="w-4 h-4" />
              <span className="text-sm">۰۱۱-۳۳۳۳۳۳۳۳</span>
            </a>
            <Button variant="default" size={isScrolled ? "sm" : "default"}>
              تماس با ما
            </Button>
          </div>

          {/* Mobile Menu Toggle */}
          <button
            className="md:hidden p-2 rounded-lg hover:bg-secondary transition-colors"
            onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
          >
            {isMobileMenuOpen ? (
              <X className="w-6 h-6 text-foreground" />
            ) : (
              <Menu className="w-6 h-6 text-foreground" />
            )}
          </button>
        </div>

        {/* Mobile Menu */}
        <div
          className={cn(
            "md:hidden overflow-hidden transition-all duration-300",
            isMobileMenuOpen ? "max-h-96 pb-4" : "max-h-0"
          )}
        >
          <nav className="flex flex-col gap-2">
            <a
              href="#"
              className="text-foreground hover:text-primary hover:bg-secondary/50 transition-colors font-medium px-4 py-3 rounded-lg"
            >
              صفحه اصلی
            </a>
            <a
              href="#products"
              className="text-foreground hover:text-primary hover:bg-secondary/50 transition-colors font-medium px-4 py-3 rounded-lg"
            >
              محصولات
            </a>
            <a
              href="#about"
              className="text-foreground hover:text-primary hover:bg-secondary/50 transition-colors font-medium px-4 py-3 rounded-lg"
            >
              درباره ما
            </a>
            <a
              href="#contact"
              className="text-foreground hover:text-primary hover:bg-secondary/50 transition-colors font-medium px-4 py-3 rounded-lg"
            >
              تماس با ما
            </a>
          </nav>
        </div>
      </div>
    </header>
  );
};

export default Header;
