import { useState, useEffect } from "react";
import { Home, Grid3X3, Phone, Sun, Moon, ShoppingCart } from "lucide-react";
import { useTheme } from "next-themes";
import { cn } from "@/lib/utils";

const MobileToolbar = () => {
  const { theme, setTheme } = useTheme();
  const [mounted, setMounted] = useState(false);
  const [isVisible, setIsVisible] = useState(true);
  const [lastScrollY, setLastScrollY] = useState(0);

  useEffect(() => {
    setMounted(true);
  }, []);

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

  const toggleTheme = () => {
    setTheme(theme === "dark" ? "light" : "dark");
  };

  const navItems = [
    { icon: Home, label: "خانه", href: "/" },
    { icon: Grid3X3, label: "محصولات", href: "/#products" },
    { icon: ShoppingCart, label: "سبد", href: "#" },
    { icon: Phone, label: "تماس", href: "/#contact" },
  ];

  return (
    <div
      className={cn(
        "md:hidden fixed bottom-4 left-4 right-4 z-50 transition-all duration-500 transform",
        isVisible ? "translate-y-0 opacity-100" : "translate-y-24 opacity-0"
      )}
    >
      {/* Shiny Border Container */}
      <div className="relative shiny-border rounded-3xl p-[2px]">
        {/* Inner Glass Container */}
        <div className="relative bg-background/60 backdrop-blur-2xl rounded-3xl overflow-hidden">
          {/* Live Blur Background */}
          <div className="absolute inset-0 live-blur" />
          
          {/* Content */}
          <div className="relative z-10 flex items-center justify-around py-3 px-2">
            {navItems.map((item, index) => (
              <a
                key={index}
                href={item.href}
                className="group flex flex-col items-center gap-1 px-3 py-2 rounded-2xl hover:bg-primary/10 transition-all duration-300"
              >
                <div className="relative">
                  <item.icon className="w-5 h-5 text-foreground group-hover:text-primary transition-colors group-hover:scale-110 transform duration-300" />
                  {/* Glow effect on hover */}
                  <div className="absolute inset-0 bg-primary/20 blur-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                </div>
                <span className="text-[10px] text-muted-foreground group-hover:text-primary transition-colors">{item.label}</span>
              </a>
            ))}
            
            {/* Theme Toggle */}
            {mounted && (
              <button
                onClick={toggleTheme}
                className="group flex flex-col items-center gap-1 px-3 py-2 rounded-2xl hover:bg-primary/10 transition-all duration-300"
                aria-label="تغییر تم"
              >
                <div className="relative">
                  {theme === "dark" ? (
                    <Sun className="w-5 h-5 text-foreground group-hover:text-primary transition-colors group-hover:scale-110 group-hover:rotate-180 transform duration-500" />
                  ) : (
                    <Moon className="w-5 h-5 text-foreground group-hover:text-primary transition-colors group-hover:scale-110 group-hover:-rotate-12 transform duration-300" />
                  )}
                  <div className="absolute inset-0 bg-primary/20 blur-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                </div>
                <span className="text-[10px] text-muted-foreground group-hover:text-primary transition-colors">
                  {theme === "dark" ? "روشن" : "تاریک"}
                </span>
              </button>
            )}
          </div>

          {/* Bottom Glow Line */}
          <div className="absolute bottom-0 left-1/2 -translate-x-1/2 w-1/2 h-[2px] bg-gradient-to-r from-transparent via-primary to-transparent opacity-50" />
        </div>
      </div>
    </div>
  );
};

export default MobileToolbar;
