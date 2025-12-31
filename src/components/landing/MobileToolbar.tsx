import { useState, useEffect } from "react";
import { Home, Grid3X3, Phone, Sun, Moon } from "lucide-react";
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
      
      // Show toolbar when scrolling up or at the top
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
    { icon: Home, label: "خانه", href: "#" },
    { icon: Grid3X3, label: "محصولات", href: "#products" },
    { icon: Phone, label: "تماس", href: "#contact" },
  ];

  return (
    <div
      className={cn(
        "md:hidden fixed bottom-4 left-4 right-4 z-50 transition-all duration-500 transform",
        isVisible ? "translate-y-0 opacity-100" : "translate-y-20 opacity-0"
      )}
    >
      <div className="glass-effect rounded-2xl shadow-xl border border-border/50 p-2">
        <div className="flex items-center justify-around">
          {navItems.map((item, index) => (
            <a
              key={index}
              href={item.href}
              className="flex flex-col items-center gap-1 px-4 py-2 rounded-xl hover:bg-secondary/50 transition-colors"
            >
              <item.icon className="w-5 h-5 text-foreground" />
              <span className="text-xs text-muted-foreground">{item.label}</span>
            </a>
          ))}
          
          {/* Theme Toggle */}
          {mounted && (
            <button
              onClick={toggleTheme}
              className="flex flex-col items-center gap-1 px-4 py-2 rounded-xl hover:bg-secondary/50 transition-colors"
              aria-label="تغییر تم"
            >
              {theme === "dark" ? (
                <>
                  <Sun className="w-5 h-5 text-foreground" />
                  <span className="text-xs text-muted-foreground">روشن</span>
                </>
              ) : (
                <>
                  <Moon className="w-5 h-5 text-foreground" />
                  <span className="text-xs text-muted-foreground">تاریک</span>
                </>
              )}
            </button>
          )}
        </div>
      </div>
    </div>
  );
};

export default MobileToolbar;
