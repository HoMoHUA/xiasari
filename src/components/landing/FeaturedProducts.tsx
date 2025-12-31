import { Button } from "@/components/ui/button";
import { ShoppingCart } from "lucide-react";
import AnimatedSection from "@/components/ui/AnimatedSection";

import xiaomi14Ultra from "@/assets/products/xiaomi-14-ultra.jpg";
import xiaomiTvAPro from "@/assets/products/xiaomi-tv-a-pro.jpg";
import roborockS8Pro from "@/assets/products/roborock-s8-pro.jpg";
import redmiNote13Pro from "@/assets/products/redmi-note-13-pro.jpg";
import xiaomiMonitor27 from "@/assets/products/xiaomi-monitor-27.jpg";
import miAirPurifier4 from "@/assets/products/mi-air-purifier-4.jpg";

const products = [
  {
    id: 1,
    name: "Xiaomi 14 Ultra",
    price: "۴۵,۹۰۰,۰۰۰",
    originalPrice: "۴۹,۰۰۰,۰۰۰",
    discount: "۷٪",
    category: "موبایل",
    image: xiaomi14Ultra,
  },
  {
    id: 2,
    name: "Xiaomi TV A Pro 55\"",
    price: "۲۲,۵۰۰,۰۰۰",
    originalPrice: "۲۵,۰۰۰,۰۰۰",
    discount: "۱۰٪",
    category: "تلویزیون",
    image: xiaomiTvAPro,
  },
  {
    id: 3,
    name: "Roborock S8 Pro Ultra",
    price: "۳۸,۰۰۰,۰۰۰",
    originalPrice: null,
    discount: null,
    category: "جارو رباتیک",
    image: roborockS8Pro,
  },
  {
    id: 4,
    name: "Redmi Note 13 Pro+",
    price: "۱۸,۹۰۰,۰۰۰",
    originalPrice: "۲۰,۵۰۰,۰۰۰",
    discount: "۸٪",
    category: "موبایل",
    image: redmiNote13Pro,
  },
  {
    id: 5,
    name: "Xiaomi Monitor 27\"",
    price: "۸,۵۰۰,۰۰۰",
    originalPrice: null,
    discount: null,
    category: "مانیتور",
    image: xiaomiMonitor27,
  },
  {
    id: 6,
    name: "Mi Air Purifier 4",
    price: "۴,۲۰۰,۰۰۰",
    originalPrice: "۴,۸۰۰,۰۰۰",
    discount: "۱۲٪",
    category: "لوازم خانگی",
    image: miAirPurifier4,
  },
];

const FeaturedProducts = () => {
  return (
    <section id="products" className="py-20 bg-background">
      <div className="container mx-auto px-4">
        <AnimatedSection animation="fade-up">
          <h2 className="text-3xl md:text-4xl font-bold text-center mb-4 text-foreground">
            پیشنهادهای <span className="text-primary">ویژه و پرفروش</span>
          </h2>
          <p className="text-muted-foreground text-center mb-16 max-w-2xl mx-auto">
            محبوب‌ترین محصولات با بهترین قیمت‌ها
          </p>
        </AnimatedSection>

        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
          {products.map((product, index) => (
            <AnimatedSection key={product.id} animation="fade-up" delay={index * 100}>
              <div className="group bg-card rounded-2xl border border-border overflow-hidden hover:border-primary/30 transition-all duration-300 hover:shadow-xl">
                {/* Product Image */}
                <div className="relative aspect-square bg-secondary/30 flex items-center justify-center overflow-hidden">
                  <img 
                    src={product.image} 
                    alt={product.name}
                    className="w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-500"
                  />
                  {product.discount && (
                    <span className="absolute top-4 right-4 bg-primary text-primary-foreground text-sm font-bold px-3 py-1 rounded-full">
                      {product.discount} تخفیف
                    </span>
                  )}
                  <span className="absolute top-4 left-4 bg-muted text-muted-foreground text-xs px-2 py-1 rounded-md">
                    {product.category}
                  </span>
                </div>

                {/* Product Info */}
                <div className="p-6">
                  <h3 className="text-lg font-bold mb-4 text-card-foreground group-hover:text-primary transition-colors">
                    {product.name}
                  </h3>
                  <div className="flex items-center justify-between">
                    <div>
                      <p className="text-xl font-bold text-primary">{product.price} تومان</p>
                      {product.originalPrice && (
                        <p className="text-sm text-muted-foreground line-through">
                          {product.originalPrice} تومان
                        </p>
                      )}
                    </div>
                    <Button size="icon" variant="default" className="rounded-full">
                      <ShoppingCart className="w-5 h-5" />
                    </Button>
                  </div>
                </div>
              </div>
            </AnimatedSection>
          ))}
        </div>
      </div>
    </section>
  );
};

export default FeaturedProducts;
