import { useState, useEffect } from "react";
import { Button } from "@/components/ui/button";
import { Menu, X, Phone } from "lucide-react";

const Header = () => {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 50);
    };
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <header
      className={`fixed top-0 right-0 left-0 z-50 transition-all duration-300 ${
        isScrolled
          ? "bg-background/95 backdrop-blur-md shadow-md"
          : "bg-transparent"
      }`}
    >
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-20">
          {/* Logo */}
          <a href="#" className="text-2xl font-bold text-primary">
            شیائومی ساری
          </a>

          {/* Desktop Navigation */}
          <nav className="hidden md:flex items-center gap-8">
            <a href="#" className="text-foreground hover:text-primary transition-colors font-medium">
              صفحه اصلی
            </a>
            <a href="#" className="text-foreground hover:text-primary transition-colors font-medium">
              محصولات
            </a>
            <a href="#" className="text-foreground hover:text-primary transition-colors font-medium">
              درباره ما
            </a>
            <a href="#" className="text-foreground hover:text-primary transition-colors font-medium">
              تماس با ما
            </a>
          </nav>

          {/* CTA Button */}
          <div className="hidden md:flex items-center gap-4">
            <a href="tel:01133333333" className="flex items-center gap-2 text-muted-foreground hover:text-primary transition-colors">
              <Phone className="w-4 h-4" />
              <span>۰۱۱-۳۳۳۳۳۳۳۳</span>
            </a>
            <Button variant="default" size="default">
              تماس با ما
            </Button>
          </div>

          {/* Mobile Menu Toggle */}
          <button
            className="md:hidden p-2"
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
        {isMobileMenuOpen && (
          <div className="md:hidden bg-background border-t border-border py-4 animate-fade-in">
            <nav className="flex flex-col gap-4">
              <a
                href="#"
                className="text-foreground hover:text-primary transition-colors font-medium px-4 py-2"
              >
                صفحه اصلی
              </a>
              <a
                href="#"
                className="text-foreground hover:text-primary transition-colors font-medium px-4 py-2"
              >
                محصولات
              </a>
              <a
                href="#"
                className="text-foreground hover:text-primary transition-colors font-medium px-4 py-2"
              >
                درباره ما
              </a>
              <a
                href="#"
                className="text-foreground hover:text-primary transition-colors font-medium px-4 py-2"
              >
                تماس با ما
              </a>
              <div className="px-4 pt-2">
                <Button variant="default" size="lg" className="w-full">
                  تماس با ما
                </Button>
              </div>
            </nav>
          </div>
        )}
      </div>
    </header>
  );
};

export default Header;
