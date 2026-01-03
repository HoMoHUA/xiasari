import { useParams, Link } from "react-router-dom";
import { useState, useEffect, useRef } from "react";
import { Button } from "@/components/ui/button";
import { 
  ArrowRight, 
  ShoppingCart, 
  Heart, 
  Share2, 
  Check, 
  Star,
  Shield,
  Truck,
  RefreshCw,
  ChevronDown
} from "lucide-react";
import Header from "@/components/landing/Header";
import Footer from "@/components/landing/Footer";
import FloatingToolbar from "@/components/landing/MobileToolbar";
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
    rating: 4.9,
    reviews: 234,
    description: "پرچمدار شیائومی با دوربین لایکا، پردازنده اسنپدراگون ۸ نسل ۳ و صفحه نمایش AMOLED با رفرش ریت ۱۲۰ هرتز",
    specs: [
      { label: "پردازنده", value: "Snapdragon 8 Gen 3" },
      { label: "رم", value: "16 گیگابایت" },
      { label: "حافظه داخلی", value: "512 گیگابایت" },
      { label: "صفحه نمایش", value: "6.73 اینچ AMOLED 120Hz" },
      { label: "دوربین اصلی", value: "50MP Leica Summilux" },
      { label: "باتری", value: "5300 میلی‌آمپر ساعت" },
      { label: "شارژ سریع", value: "90W سیمی / 80W بی‌سیم" },
      { label: "سیستم عامل", value: "Android 14 / HyperOS" },
    ],
    colors: ["مشکی", "سفید", "سبز"],
    inStock: true,
  },
  {
    id: 2,
    name: "Xiaomi TV A Pro 55\"",
    price: "۲۲,۵۰۰,۰۰۰",
    originalPrice: "۲۵,۰۰۰,۰۰۰",
    discount: "۱۰٪",
    category: "تلویزیون",
    image: xiaomiTvAPro,
    rating: 4.7,
    reviews: 156,
    description: "تلویزیون هوشمند ۵۵ اینچی با کیفیت ۴K UHD، سیستم عامل Google TV و پشتیبانی از Dolby Vision",
    specs: [
      { label: "سایز صفحه", value: "55 اینچ" },
      { label: "رزولوشن", value: "4K UHD (3840x2160)" },
      { label: "پنل", value: "LED" },
      { label: "رفرش ریت", value: "60Hz" },
      { label: "سیستم عامل", value: "Google TV" },
      { label: "صدا", value: "Dolby Audio, DTS-HD" },
      { label: "پورت‌ها", value: "3x HDMI, 2x USB" },
      { label: "وای‌فای", value: "دوباند 2.4/5GHz" },
    ],
    colors: ["مشکی"],
    inStock: true,
  },
  {
    id: 3,
    name: "Roborock S8 Pro Ultra",
    price: "۳۸,۰۰۰,۰۰۰",
    originalPrice: null,
    discount: null,
    category: "جارو رباتیک",
    image: roborockS8Pro,
    rating: 4.8,
    reviews: 89,
    description: "جارو رباتیک پیشرفته با ایستگاه شارژ و تخلیه خودکار، قابلیت شستشوی تی و مکش قدرتمند",
    specs: [
      { label: "قدرت مکش", value: "6000Pa" },
      { label: "باتری", value: "5200 میلی‌آمپر ساعت" },
      { label: "مدت کارکرد", value: "تا 180 دقیقه" },
      { label: "ناوبری", value: "LiDAR + 3D Structured Light" },
      { label: "ایستگاه", value: "شارژ + تخلیه + شستشو" },
      { label: "مخزن آب", value: "400 میلی‌لیتر" },
      { label: "مخزن گرد و غبار", value: "400 میلی‌لیتر" },
      { label: "کنترل", value: "اپلیکیشن + صوتی" },
    ],
    colors: ["مشکی"],
    inStock: true,
  },
  {
    id: 4,
    name: "Redmi Note 13 Pro+",
    price: "۱۸,۹۰۰,۰۰۰",
    originalPrice: "۲۰,۵۰۰,۰۰۰",
    discount: "۸٪",
    category: "موبایل",
    image: redmiNote13Pro,
    rating: 4.6,
    reviews: 312,
    description: "گوشی میان‌رده با دوربین ۲۰۰ مگاپیکسلی، شارژ سریع ۱۲۰ وات و صفحه نمایش AMOLED",
    specs: [
      { label: "پردازنده", value: "MediaTek Dimensity 7200 Ultra" },
      { label: "رم", value: "12 گیگابایت" },
      { label: "حافظه داخلی", value: "256 گیگابایت" },
      { label: "صفحه نمایش", value: "6.67 اینچ AMOLED 120Hz" },
      { label: "دوربین اصلی", value: "200MP Samsung ISOCELL" },
      { label: "باتری", value: "5000 میلی‌آمپر ساعت" },
      { label: "شارژ سریع", value: "120W HyperCharge" },
      { label: "سیستم عامل", value: "Android 13 / MIUI 14" },
    ],
    colors: ["مشکی", "سفید", "بنفش"],
    inStock: true,
  },
  {
    id: 5,
    name: "Xiaomi Monitor 27\"",
    price: "۸,۵۰۰,۰۰۰",
    originalPrice: null,
    discount: null,
    category: "مانیتور",
    image: xiaomiMonitor27,
    rating: 4.5,
    reviews: 78,
    description: "مانیتور ۲۷ اینچی با پنل IPS، رزولوشن ۴K و پوشش رنگی عالی برای کار حرفه‌ای",
    specs: [
      { label: "سایز صفحه", value: "27 اینچ" },
      { label: "رزولوشن", value: "4K UHD (3840x2160)" },
      { label: "پنل", value: "IPS" },
      { label: "رفرش ریت", value: "60Hz" },
      { label: "زمان پاسخ‌دهی", value: "5ms" },
      { label: "پوشش رنگی", value: "99% sRGB" },
      { label: "روشنایی", value: "350 نیت" },
      { label: "پورت‌ها", value: "HDMI, DisplayPort, USB-C" },
    ],
    colors: ["نقره‌ای"],
    inStock: true,
  },
  {
    id: 6,
    name: "Mi Air Purifier 4",
    price: "۴,۲۰۰,۰۰۰",
    originalPrice: "۴,۸۰۰,۰۰۰",
    discount: "۱۲٪",
    category: "لوازم خانگی",
    image: miAirPurifier4,
    rating: 4.4,
    reviews: 145,
    description: "دستگاه تصفیه هوا با فیلتر HEPA، سنسور ذرات PM2.5 و قابلیت کنترل هوشمند",
    specs: [
      { label: "پوشش فضا", value: "تا 48 متر مربع" },
      { label: "فیلتر", value: "True HEPA 3-layer" },
      { label: "CADR", value: "400 متر مکعب در ساعت" },
      { label: "سطح نویز", value: "32-64 دسی‌بل" },
      { label: "سنسور", value: "PM2.5, دما, رطوبت" },
      { label: "کنترل", value: "اپلیکیشن Mi Home" },
      { label: "توان مصرفی", value: "33 وات" },
      { label: "ابعاد", value: "250x250x555 میلی‌متر" },
    ],
    colors: ["سفید"],
    inStock: true,
  },
];

const ProductDetail = () => {
  const { id } = useParams();
  const [selectedColor, setSelectedColor] = useState(0);
  const [isWishlisted, setIsWishlisted] = useState(false);
  const [showSpecs, setShowSpecs] = useState(false);
  const imageRef = useRef<HTMLDivElement>(null);
  const [mousePosition, setMousePosition] = useState({ x: 0, y: 0 });

  const product = products.find(p => p.id === Number(id));

  useEffect(() => {
    window.scrollTo(0, 0);
  }, [id]);

  const handleMouseMove = (e: React.MouseEvent<HTMLDivElement>) => {
    if (!imageRef.current) return;
    const rect = imageRef.current.getBoundingClientRect();
    const x = (e.clientX - rect.left) / rect.width - 0.5;
    const y = (e.clientY - rect.top) / rect.height - 0.5;
    setMousePosition({ x: x * 20, y: y * 20 });
  };

  const handleMouseLeave = () => {
    setMousePosition({ x: 0, y: 0 });
  };

  if (!product) {
    return (
      <div className="min-h-screen bg-background flex items-center justify-center">
        <div className="text-center">
          <h1 className="text-2xl font-bold text-foreground mb-4">محصول یافت نشد</h1>
          <Link to="/">
            <Button>بازگشت به صفحه اصلی</Button>
          </Link>
        </div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-background overflow-hidden">
      {/* Animated Background */}
      <div className="fixed inset-0 pointer-events-none">
        <div className="absolute top-0 left-1/4 w-96 h-96 bg-primary/5 rounded-full blur-3xl animate-float" />
        <div className="absolute bottom-1/4 right-1/4 w-80 h-80 bg-primary/10 rounded-full blur-3xl animate-float" style={{ animationDelay: '-1.5s' }} />
        <div className="absolute top-1/2 right-1/3 w-64 h-64 bg-primary/5 rounded-full blur-3xl animate-float" style={{ animationDelay: '-0.5s' }} />
      </div>

      <Header />
      
      <main className="relative z-10 pt-32 pb-20">
        <div className="container mx-auto px-4">
          {/* Breadcrumb */}
          <AnimatedSection animation="fade-up">
            <nav className="flex items-center gap-2 text-sm text-muted-foreground mb-8">
              <Link to="/" className="hover:text-primary transition-colors">صفحه اصلی</Link>
              <span>/</span>
              <Link to="/#products" className="hover:text-primary transition-colors">محصولات</Link>
              <span>/</span>
              <span className="text-foreground">{product.name}</span>
            </nav>
          </AnimatedSection>

          <div className="grid lg:grid-cols-2 gap-12 lg:gap-20">
            {/* Product Image Section */}
            <AnimatedSection animation="fade-up" className="relative">
              <div 
                ref={imageRef}
                className="relative glass-card rounded-3xl p-8 overflow-hidden group"
                onMouseMove={handleMouseMove}
                onMouseLeave={handleMouseLeave}
              >
                {/* Live blur background */}
                <div className="absolute inset-0 live-blur bg-gradient-to-br from-primary/5 via-transparent to-primary/10" />
                
                {/* Discount Badge */}
                {product.discount && (
                  <div className="absolute top-6 right-6 z-20">
                    <span className="bg-primary text-primary-foreground text-sm font-bold px-4 py-2 rounded-full animate-pulse-glow">
                      {product.discount} تخفیف
                    </span>
                  </div>
                )}

                {/* Category Badge */}
                <div className="absolute top-6 left-6 z-20">
                  <span className="glass-effect text-foreground text-xs px-3 py-1.5 rounded-full">
                    {product.category}
                  </span>
                </div>

                {/* Product Image with 3D Effect */}
                <div 
                  className="relative z-10 aspect-square flex items-center justify-center transition-transform duration-300 ease-out"
                  style={{
                    transform: `perspective(1000px) rotateY(${mousePosition.x}deg) rotateX(${-mousePosition.y}deg)`
                  }}
                >
                  <img 
                    src={product.image}
                    alt={product.name}
                    className="w-full h-full object-contain drop-shadow-2xl"
                  />
                </div>

                {/* Shimmer Effect */}
                <div className="absolute inset-0 animate-shimmer pointer-events-none" />

                {/* Floating Elements */}
                <div className="absolute -bottom-4 -right-4 w-32 h-32 bg-primary/20 rounded-full blur-2xl animate-float" />
                <div className="absolute -top-4 -left-4 w-24 h-24 bg-primary/10 rounded-full blur-xl animate-float" style={{ animationDelay: '-1s' }} />
              </div>

              {/* Action Buttons */}
              <div className="flex gap-4 mt-6">
                <button 
                  onClick={() => setIsWishlisted(!isWishlisted)}
                  className={`
                    flex-1 glass-card rounded-2xl p-4 flex items-center justify-center gap-2 
                    transition-all duration-300 hover:scale-105
                    ${isWishlisted ? 'text-red-500 border-red-500/30' : 'text-muted-foreground'}
                  `}
                >
                  <Heart className={`w-5 h-5 ${isWishlisted ? 'fill-current' : ''}`} />
                  <span className="text-sm">افزودن به علاقه‌مندی</span>
                </button>
                <button className="glass-card rounded-2xl p-4 flex items-center justify-center gap-2 text-muted-foreground hover:text-primary transition-all duration-300 hover:scale-105">
                  <Share2 className="w-5 h-5" />
                  <span className="text-sm">اشتراک‌گذاری</span>
                </button>
              </div>
            </AnimatedSection>

            {/* Product Info Section */}
            <div className="space-y-8">
              <AnimatedSection animation="fade-up" delay={100}>
                <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold text-foreground mb-4">
                  {product.name}
                </h1>
                
                {/* Rating */}
                <div className="flex items-center gap-4 mb-6">
                  <div className="flex items-center gap-1">
                    {[...Array(5)].map((_, i) => (
                      <Star 
                        key={i} 
                        className={`w-5 h-5 ${i < Math.floor(product.rating) ? 'text-yellow-500 fill-yellow-500' : 'text-muted-foreground'}`}
                      />
                    ))}
                  </div>
                  <span className="text-foreground font-semibold">{product.rating}</span>
                  <span className="text-muted-foreground">({product.reviews} نظر)</span>
                </div>

                <p className="text-lg text-muted-foreground leading-relaxed">
                  {product.description}
                </p>
              </AnimatedSection>

              {/* Price Section */}
              <AnimatedSection animation="fade-up" delay={200}>
                <div className="glass-card rounded-3xl p-6">
                  <div className="flex items-baseline gap-4 mb-4">
                    <span className="text-4xl font-bold text-primary">{product.price}</span>
                    <span className="text-lg text-muted-foreground">تومان</span>
                  </div>
                  {product.originalPrice && (
                    <p className="text-muted-foreground line-through text-lg">
                      {product.originalPrice} تومان
                    </p>
                  )}
                  
                  {/* Stock Status */}
                  <div className="flex items-center gap-2 mt-4 text-green-500">
                    <Check className="w-5 h-5" />
                    <span>موجود در انبار</span>
                  </div>
                </div>
              </AnimatedSection>

              {/* Color Selection */}
              <AnimatedSection animation="fade-up" delay={300}>
                <div className="glass-card rounded-3xl p-6">
                  <h3 className="text-lg font-semibold text-foreground mb-4">انتخاب رنگ</h3>
                  <div className="flex gap-4">
                    {product.colors.map((color, index) => (
                      <button
                        key={index}
                        onClick={() => setSelectedColor(index)}
                        className={`
                          px-6 py-3 rounded-xl border-2 transition-all duration-300
                          ${selectedColor === index 
                            ? 'border-primary bg-primary/10 text-primary scale-105' 
                            : 'border-border text-muted-foreground hover:border-primary/50'
                          }
                        `}
                      >
                        {color}
                      </button>
                    ))}
                  </div>
                </div>
              </AnimatedSection>

              {/* CTA Buttons */}
              <AnimatedSection animation="fade-up" delay={400}>
                <div className="flex gap-4">
                  <Button size="lg" className="flex-1 h-14 text-lg rounded-2xl animate-pulse-glow">
                    <ShoppingCart className="w-6 h-6 ml-2" />
                    افزودن به سبد خرید
                  </Button>
                  <Link to="/" className="glass-card rounded-2xl p-4 flex items-center justify-center hover:bg-secondary/50 transition-colors">
                    <ArrowRight className="w-6 h-6 text-foreground" />
                  </Link>
                </div>
              </AnimatedSection>

              {/* Features */}
              <AnimatedSection animation="fade-up" delay={500}>
                <div className="grid grid-cols-3 gap-4">
                  <div className="glass-card rounded-2xl p-4 text-center hover:scale-105 transition-transform duration-300">
                    <Shield className="w-8 h-8 text-primary mx-auto mb-2" />
                    <span className="text-sm text-muted-foreground">گارانتی اصالت</span>
                  </div>
                  <div className="glass-card rounded-2xl p-4 text-center hover:scale-105 transition-transform duration-300">
                    <Truck className="w-8 h-8 text-primary mx-auto mb-2" />
                    <span className="text-sm text-muted-foreground">ارسال رایگان</span>
                  </div>
                  <div className="glass-card rounded-2xl p-4 text-center hover:scale-105 transition-transform duration-300">
                    <RefreshCw className="w-8 h-8 text-primary mx-auto mb-2" />
                    <span className="text-sm text-muted-foreground">۷ روز ضمانت بازگشت</span>
                  </div>
                </div>
              </AnimatedSection>
            </div>
          </div>

          {/* Specifications Section */}
          <AnimatedSection animation="fade-up" className="mt-20">
            <div className="glass-card rounded-3xl overflow-hidden">
              <button 
                onClick={() => setShowSpecs(!showSpecs)}
                className="w-full p-6 flex items-center justify-between hover:bg-secondary/20 transition-colors"
              >
                <h2 className="text-2xl font-bold text-foreground">مشخصات فنی</h2>
                <ChevronDown className={`w-6 h-6 text-muted-foreground transition-transform duration-300 ${showSpecs ? 'rotate-180' : ''}`} />
              </button>
              
              <div className={`overflow-hidden transition-all duration-500 ${showSpecs ? 'max-h-[1000px] opacity-100' : 'max-h-0 opacity-0'}`}>
                <div className="p-6 pt-0 grid md:grid-cols-2 gap-4">
                  {product.specs.map((spec, index) => (
                    <div 
                      key={index} 
                      className="flex justify-between items-center p-4 rounded-xl bg-secondary/30 hover:bg-secondary/50 transition-colors"
                      style={{ animationDelay: `${index * 50}ms` }}
                    >
                      <span className="text-muted-foreground">{spec.label}</span>
                      <span className="text-foreground font-medium">{spec.value}</span>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          </AnimatedSection>

          {/* Related Products */}
          <AnimatedSection animation="fade-up" className="mt-20">
            <h2 className="text-2xl font-bold text-foreground mb-8">محصولات مرتبط</h2>
            <div className="grid grid-cols-2 md:grid-cols-4 gap-6">
              {products.filter(p => p.id !== product.id).slice(0, 4).map((relatedProduct, index) => (
                <Link 
                  key={relatedProduct.id} 
                  to={`/product/${relatedProduct.id}`}
                  className="group"
                >
                  <AnimatedSection animation="scale-in" delay={index * 100}>
                    <div className="glass-card-hover rounded-2xl overflow-hidden">
                      <div className="aspect-square p-4 bg-secondary/20">
                        <img 
                          src={relatedProduct.image}
                          alt={relatedProduct.name}
                          className="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500"
                        />
                      </div>
                      <div className="p-4">
                        <h3 className="text-sm font-semibold text-foreground group-hover:text-primary transition-colors line-clamp-1">
                          {relatedProduct.name}
                        </h3>
                        <p className="text-primary font-bold mt-2">{relatedProduct.price} تومان</p>
                      </div>
                    </div>
                  </AnimatedSection>
                </Link>
              ))}
            </div>
          </AnimatedSection>
        </div>
      </main>

      <Footer />
      <FloatingToolbar />
    </div>
  );
};

export default ProductDetail;