import { useState, useEffect } from "react";
import { Home, Grid3X3, Phone, ShoppingCart, ArrowUp } from "lucide-react";
import { cn } from "@/lib/utils";

const FloatingToolbar = () => {
  const [isVisible, setIsVisible] = useState(true);
  const [lastScrollY, setLastScrollY] = useState(0);

  useEffect(() => {
    const handleScroll = () => {
      const currentScrollY = window.scrollY;
      
      if (currentScrollY < lastScrollY || currentScrollY < 100) {
        setIsVisible(true);
      } else if (currentScrollY > lastScrollY && currentScrollY > 100) {
        setIsVisible(false);
      }
      
      setLastScrollY(currentScrollY);
    };

    window.addEventListener("scroll", handleScroll, { passive: true });
    return () => window.removeEventListener("scroll", handleScroll);
  }, [lastScrollY]);

  const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const navItems = [
    { icon: Home, label: "خانه", href: "/" },
    { icon: Grid3X3, label: "محصولات", href: "/#products" },
    { icon: ShoppingCart, label: "سبد", href: "#" },
    { icon: Phone, label: "تماس", href: "/#contact" },
  ];

  return (
    <>
      {/* Mobile Toolbar - Bottom */}
      <div
        className={cn(
          "md:hidden fixed bottom-4 left-4 right-4 z-50 transition-all duration-500 transform",
          isVisible ? "translate-y-0 opacity-100" : "translate-y-24 opacity-0"
        )}
      >
        <div className="relative shiny-border rounded-3xl p-[2px]">
          <div className="relative bg-[#121212]/80 backdrop-blur-2xl rounded-3xl overflow-hidden">
            <div className="absolute inset-0 live-blur" />
            
            <div className="relative z-10 flex items-center justify-around py-3 px-2">
              {navItems.map((item, index) => (
                <a
                  key={index}
                  href={item.href}
                  className="group flex flex-col items-center gap-1 px-3 py-2 rounded-2xl hover:bg-primary/10 transition-all duration-300"
                >
                  <div className="relative">
                    <item.icon className="w-5 h-5 text-foreground group-hover:text-primary transition-colors group-hover:scale-110 transform duration-300" />
                    <div className="absolute inset-0 bg-primary/20 blur-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                  </div>
                  <span className="text-[10px] text-muted-foreground group-hover:text-primary transition-colors">{item.label}</span>
                </a>
              ))}
              
              <button
                onClick={scrollToTop}
                className="group flex flex-col items-center gap-1 px-3 py-2 rounded-2xl hover:bg-primary/10 transition-all duration-300"
                aria-label="بالای صفحه"
              >
                <div className="relative">
                  <ArrowUp className="w-5 h-5 text-foreground group-hover:text-primary transition-colors group-hover:scale-110 group-hover:-translate-y-1 transform duration-300" />
                  <div className="absolute inset-0 bg-primary/20 blur-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                </div>
                <span className="text-[10px] text-muted-foreground group-hover:text-primary transition-colors">بالا</span>
              </button>
            </div>

            <div className="absolute bottom-0 left-1/2 -translate-x-1/2 w-1/2 h-[2px] bg-gradient-to-r from-transparent via-primary to-transparent opacity-50" />
          </div>
        </div>
      </div>

      {/* Desktop Toolbar - Right Side */}
      <div
        className={cn(
          "hidden md:block fixed right-4 top-1/2 -translate-y-1/2 z-50 transition-all duration-500 transform",
          isVisible ? "translate-x-0 opacity-100" : "translate-x-24 opacity-0"
        )}
      >
        <div className="relative shiny-border rounded-3xl p-[2px]">
          <div className="relative bg-[#121212]/80 backdrop-blur-2xl rounded-3xl overflow-hidden">
            <div className="absolute inset-0 live-blur" />
            
            <div className="relative z-10 flex flex-col items-center gap-1 py-4 px-2">
              {navItems.map((item, index) => (
                <a
                  key={index}
                  href={item.href}
                  className="group flex flex-col items-center gap-1 px-4 py-3 rounded-2xl hover:bg-primary/10 transition-all duration-300 w-full"
                >
                  <div className="relative">
                    <item.icon className="w-5 h-5 text-foreground group-hover:text-primary transition-colors group-hover:scale-110 transform duration-300" />
                    <div className="absolute inset-0 bg-primary/20 blur-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                  </div>
                  <span className="text-[10px] text-muted-foreground group-hover:text-primary transition-colors whitespace-nowrap">{item.label}</span>
                </a>
              ))}
              
              {/* Divider */}
              <div className="w-8 h-[1px] bg-border/50 my-1" />
              
              <button
                onClick={scrollToTop}
                className="group flex flex-col items-center gap-1 px-4 py-3 rounded-2xl hover:bg-primary/10 transition-all duration-300 w-full"
                aria-label="بالای صفحه"
              >
                <div className="relative">
                  <ArrowUp className="w-5 h-5 text-foreground group-hover:text-primary transition-colors group-hover:scale-110 group-hover:-translate-y-1 transform duration-300" />
                  <div className="absolute inset-0 bg-primary/20 blur-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                </div>
                <span className="text-[10px] text-muted-foreground group-hover:text-primary transition-colors">بالا</span>
              </button>
            </div>

            {/* Right Glow Line */}
            <div className="absolute right-0 top-1/2 -translate-y-1/2 h-1/2 w-[2px] bg-gradient-to-b from-transparent via-primary to-transparent opacity-50" />
          </div>
        </div>
      </div>
    </>
  );
};

export default FloatingToolbar;
