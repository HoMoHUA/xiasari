import { Phone, MapPin, Clock, Instagram, Send } from "lucide-react";
import AnimatedSection from "@/components/ui/AnimatedSection";

const Footer = () => {
  return (
    <footer className="bg-foreground text-background py-16 pb-32 md:pb-16">
      <div className="container mx-auto px-4">
        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
          {/* Brand */}
          <AnimatedSection animation="fade-up" delay={0}>
            <div>
              <h3 className="text-2xl font-bold mb-4 text-primary">شیائومی ساری</h3>
              <p className="text-background/70 leading-relaxed">
                فروشگاه تخصصی محصولات شیائومی با تضمین اصالت کالا و بهترین قیمت در بازار.
              </p>
            </div>
          </AnimatedSection>

          {/* Quick Links */}
          <AnimatedSection animation="fade-up" delay={100}>
            <div>
              <h4 className="text-lg font-bold mb-4">دسترسی سریع</h4>
              <ul className="space-y-3">
                <li>
                  <a href="#" className="text-background/70 hover:text-primary transition-colors">
                    صفحه اصلی
                  </a>
                </li>
                <li>
                  <a href="#products" className="text-background/70 hover:text-primary transition-colors">
                    محصولات
                  </a>
                </li>
                <li>
                  <a href="#about" className="text-background/70 hover:text-primary transition-colors">
                    درباره ما
                  </a>
                </li>
                <li>
                  <a href="#contact" className="text-background/70 hover:text-primary transition-colors">
                    تماس با ما
                  </a>
                </li>
              </ul>
            </div>
          </AnimatedSection>

          {/* Contact Info */}
          <AnimatedSection animation="fade-up" delay={200}>
            <div>
              <h4 className="text-lg font-bold mb-4">اطلاعات تماس</h4>
              <ul className="space-y-4">
                <li className="flex items-center gap-3">
                  <Phone className="w-5 h-5 text-primary" />
                  <span className="text-background/70">۰۱۱-۳۳۳۳۳۳۳۳</span>
                </li>
                <li className="flex items-center gap-3">
                  <MapPin className="w-5 h-5 text-primary" />
                  <span className="text-background/70">ساری، خیابان فرهنگ</span>
                </li>
                <li className="flex items-center gap-3">
                  <Clock className="w-5 h-5 text-primary" />
                  <span className="text-background/70">۹ صبح تا ۹ شب</span>
                </li>
              </ul>
            </div>
          </AnimatedSection>

          {/* Social Media */}
          <AnimatedSection animation="fade-up" delay={300}>
            <div>
              <h4 className="text-lg font-bold mb-4">شبکه‌های اجتماعی</h4>
              <div className="flex gap-4">
                <a
                  href="#"
                  className="w-12 h-12 bg-background/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors"
                >
                  <Instagram className="w-5 h-5" />
                </a>
                <a
                  href="#"
                  className="w-12 h-12 bg-background/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors"
                >
                  <Send className="w-5 h-5" />
                </a>
              </div>
            </div>
          </AnimatedSection>
        </div>

        {/* Copyright */}
        <AnimatedSection animation="fade-in" delay={400}>
          <div className="border-t border-background/10 pt-8 text-center">
            <p className="text-background/50">
              © ۱۴۰۳ شیائومی ساری - تمامی حقوق محفوظ است.
            </p>
          </div>
        </AnimatedSection>
      </div>
    </footer>
  );
};

export default Footer;
