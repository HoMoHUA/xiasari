import { useState } from "react";
import { Link } from "react-router-dom";
import Header from "@/components/landing/Header";
import Footer from "@/components/landing/Footer";
import FloatingToolbar from "@/components/landing/MobileToolbar";
import AnimatedSection from "@/components/ui/AnimatedSection";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { ShoppingCart, Eye, Search, Filter, ChevronDown } from "lucide-react";

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

const categories = ["همه", "موبایل", "تلویزیون", "جارو رباتیک", "مانیتور", "لوازم خانگی"];

const Shop = () => {
  const [selectedCategory, setSelectedCategory] = useState("همه");
  const [searchQuery, setSearchQuery] = useState("");
  const [showFilters, setShowFilters] = useState(false);

  const filteredProducts = products.filter((product) => {
    const matchesCategory = selectedCategory === "همه" || product.category === selectedCategory;
    const matchesSearch = product.name.toLowerCase().includes(searchQuery.toLowerCase());
    return matchesCategory && matchesSearch;
  });

  return (
    <div className="min-h-screen bg-background">
      <Header />
      
      <main className="pt-32 pb-20">
        {/* Hero Section */}
        <section className="container mx-auto px-4 mb-12">
          <AnimatedSection animation="fade-up">
            <div className="text-center max-w-4xl mx-auto">
              <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold text-foreground mb-6">
                فروشگاه <span className="text-primary">شیائومی ساری</span>
              </h1>
              <p className="text-xl text-muted-foreground leading-relaxed">
                جدیدترین محصولات شیائومی با بهترین قیمت
              </p>
            </div>
          </AnimatedSection>
        </section>

        {/* Filters Section */}
        <section className="container mx-auto px-4 mb-12">
          <AnimatedSection animation="fade-up" delay={100}>
            <div className="glass-card rounded-2xl p-6">
              <div className="flex flex-col lg:flex-row gap-6 items-center justify-between">
                {/* Search */}
                <div className="relative w-full lg:w-96">
                  <Search className="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                  <Input
                    value={searchQuery}
                    onChange={(e) => setSearchQuery(e.target.value)}
                    placeholder="جستجوی محصول..."
                    className="pr-12 rounded-xl h-12"
                  />
                </div>

                {/* Category Filters - Desktop */}
                <div className="hidden lg:flex items-center gap-3">
                  {categories.map((category) => (
                    <button
                      key={category}
                      onClick={() => setSelectedCategory(category)}
                      className={`px-4 py-2 rounded-xl transition-all duration-300 ${
                        selectedCategory === category
                          ? "bg-primary text-primary-foreground"
                          : "bg-secondary text-foreground hover:bg-secondary/80"
                      }`}
                    >
                      {category}
                    </button>
                  ))}
                </div>

                {/* Mobile Filter Toggle */}
                <button
                  onClick={() => setShowFilters(!showFilters)}
                  className="lg:hidden flex items-center gap-2 px-4 py-2 rounded-xl bg-secondary text-foreground"
                >
                  <Filter className="w-5 h-5" />
                  فیلترها
                  <ChevronDown className={`w-4 h-4 transition-transform ${showFilters ? "rotate-180" : ""}`} />
                </button>
              </div>

              {/* Mobile Filters */}
              {showFilters && (
                <div className="lg:hidden mt-6 flex flex-wrap gap-2">
                  {categories.map((category) => (
                    <button
                      key={category}
                      onClick={() => setSelectedCategory(category)}
                      className={`px-4 py-2 rounded-xl transition-all duration-300 ${
                        selectedCategory === category
                          ? "bg-primary text-primary-foreground"
                          : "bg-secondary text-foreground hover:bg-secondary/80"
                      }`}
                    >
                      {category}
                    </button>
                  ))}
                </div>
              )}
            </div>
          </AnimatedSection>
        </section>

        {/* Products Grid */}
        <section className="container mx-auto px-4">
          <div className="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            {filteredProducts.map((product, index) => (
              <AnimatedSection key={product.id} animation="fade-up" delay={index * 50}>
                <div className="group glass-card-hover rounded-2xl overflow-hidden">
                  {/* Product Image */}
                  <div className="relative aspect-square bg-secondary/20 flex items-center justify-center overflow-hidden">
                    <img 
                      src={product.image} 
                      alt={product.name}
                      className="w-full h-full object-contain p-4 group-hover:scale-110 transition-transform duration-700"
                    />
                    
                    {/* Overlay on Hover */}
                    <div className="absolute inset-0 bg-background/60 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center gap-4">
                      <Link 
                        to={`/product/${product.id}`}
                        className="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-primary-foreground hover:scale-110 transition-transform duration-300"
                      >
                        <Eye className="w-5 h-5" />
                      </Link>
                      <button className="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-foreground hover:scale-110 transition-transform duration-300">
                        <ShoppingCart className="w-5 h-5" />
                      </button>
                    </div>

                    {product.discount && (
                      <span className="absolute top-4 right-4 bg-primary text-primary-foreground text-sm font-bold px-3 py-1 rounded-full">
                        {product.discount} تخفیف
                      </span>
                    )}
                    <span className="absolute top-4 left-4 glass-effect text-foreground text-xs px-2 py-1 rounded-md">
                      {product.category}
                    </span>
                  </div>

                  {/* Product Info */}
                  <div className="p-6">
                    <Link to={`/product/${product.id}`}>
                      <h3 className="text-lg font-bold mb-4 text-card-foreground group-hover:text-primary transition-colors">
                        {product.name}
                      </h3>
                    </Link>
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

          {filteredProducts.length === 0 && (
            <div className="text-center py-20">
              <p className="text-muted-foreground text-lg">محصولی یافت نشد</p>
            </div>
          )}
        </section>
      </main>

      <Footer />
      <FloatingToolbar />
    </div>
  );
};

export default Shop;
