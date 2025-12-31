import { Button } from "@/components/ui/button";
import heroProducts from "@/assets/hero-products.jpg";

const HeroSection = () => {
  return (
    <section className="relative min-h-screen bg-gradient-to-b from-background to-secondary/30 overflow-hidden">
      <div className="container mx-auto px-4 pt-24 pb-16">
        <div className="grid lg:grid-cols-2 gap-12 items-center">
          {/* Content */}
          <div className="space-y-8 animate-slide-up">
            <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-foreground">
              شیائومی ساری:
              <span className="block text-primary mt-2">جدیدترین گجت‌ها، بهترین قیمت‌ها</span>
            </h1>
            <p className="text-lg md:text-xl text-muted-foreground leading-relaxed max-w-xl">
              تنوع کامل محصولات شیائومی، از موبایل تا لوازم خانگی هوشمند، با تضمین قیمت رقابتی و اصالت کالا.
            </p>
            <div className="flex flex-col sm:flex-row gap-4">
              <Button variant="hero" size="xl">
                مشاهده محصولات و قیمت‌ها
              </Button>
              <Button variant="heroOutline" size="xl">
                دریافت مشاوره تلفنی رایگان
              </Button>
            </div>
          </div>

          {/* Hero Image */}
          <div className="relative animate-fade-in">
            <div className="relative z-10">
              <img
                src={heroProducts}
                alt="محصولات شیائومی - گوشی، تلویزیون، جارو رباتیک و گجت‌های هوشمند"
                className="w-full h-auto rounded-2xl shadow-2xl"
              />
            </div>
            {/* Decorative Elements */}
            <div className="absolute -top-8 -right-8 w-64 h-64 bg-primary/10 rounded-full blur-3xl" />
            <div className="absolute -bottom-8 -left-8 w-48 h-48 bg-primary/5 rounded-full blur-2xl" />
          </div>
        </div>
      </div>

      {/* Scroll Indicator */}
      <div className="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <div className="w-6 h-10 border-2 border-muted-foreground/30 rounded-full flex justify-center">
          <div className="w-1.5 h-3 bg-muted-foreground/30 rounded-full mt-2" />
        </div>
      </div>
    </section>
  );
};

export default HeroSection;
