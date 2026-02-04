import { useState } from "react";
import Header from "@/components/landing/Header";
import Footer from "@/components/landing/Footer";
import FloatingToolbar from "@/components/landing/MobileToolbar";
import AnimatedSection from "@/components/ui/AnimatedSection";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";
import { Phone, MapPin, Clock, Instagram, Send, Mail } from "lucide-react";
import { useToast } from "@/hooks/use-toast";

const Contact = () => {
  const { toast } = useToast();
  const [formData, setFormData] = useState({
    name: "",
    phone: "",
    email: "",
    message: ""
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    toast({
      title: "پیام شما ارسال شد",
      description: "به زودی با شما تماس خواهیم گرفت."
    });
    setFormData({ name: "", phone: "", email: "", message: "" });
  };

  const contactInfo = [
    {
      icon: Phone,
      title: "تلفن",
      value: "۰۱۱-۳۳۳۳۳۳۳۳",
      link: "tel:01133333333"
    },
    {
      icon: MapPin,
      title: "آدرس",
      value: "ساری، خیابان فرهنگ، پلاک ۱۲۳",
      link: null
    },
    {
      icon: Clock,
      title: "ساعات کاری",
      value: "شنبه تا پنجشنبه: ۹ صبح تا ۹ شب",
      link: null
    },
    {
      icon: Mail,
      title: "ایمیل",
      value: "info@xiaomisari.ir",
      link: "mailto:info@xiaomisari.ir"
    }
  ];

  return (
    <div className="min-h-screen bg-background">
      <Header />
      
      <main className="pt-32 pb-20">
        {/* Hero Section */}
        <section className="container mx-auto px-4 mb-20">
          <AnimatedSection animation="fade-up">
            <div className="text-center max-w-4xl mx-auto">
              <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold text-foreground mb-6">
                تماس با <span className="text-primary">ما</span>
              </h1>
              <p className="text-xl text-muted-foreground leading-relaxed">
                سوالی دارید؟ با ما در تماس باشید. تیم ما آماده پاسخگویی به شماست.
              </p>
            </div>
          </AnimatedSection>
        </section>

        {/* Contact Section */}
        <section className="container mx-auto px-4">
          <div className="grid lg:grid-cols-2 gap-12">
            {/* Contact Form */}
            <AnimatedSection animation="fade-up">
              <div className="glass-card rounded-3xl p-8 md:p-12">
                <h2 className="text-2xl font-bold text-foreground mb-8">ارسال پیام</h2>
                <form onSubmit={handleSubmit} className="space-y-6">
                  <div className="grid md:grid-cols-2 gap-6">
                    <div>
                      <label className="block text-sm font-medium text-foreground mb-2">
                        نام و نام خانوادگی
                      </label>
                      <Input
                        value={formData.name}
                        onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                        placeholder="نام خود را وارد کنید"
                        className="rounded-xl h-12"
                        required
                      />
                    </div>
                    <div>
                      <label className="block text-sm font-medium text-foreground mb-2">
                        شماره تماس
                      </label>
                      <Input
                        value={formData.phone}
                        onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                        placeholder="۰۹۱۲۳۴۵۶۷۸۹"
                        className="rounded-xl h-12"
                        required
                      />
                    </div>
                  </div>
                  <div>
                    <label className="block text-sm font-medium text-foreground mb-2">
                      ایمیل
                    </label>
                    <Input
                      type="email"
                      value={formData.email}
                      onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                      placeholder="email@example.com"
                      className="rounded-xl h-12"
                    />
                  </div>
                  <div>
                    <label className="block text-sm font-medium text-foreground mb-2">
                      پیام
                    </label>
                    <Textarea
                      value={formData.message}
                      onChange={(e) => setFormData({ ...formData, message: e.target.value })}
                      placeholder="پیام خود را بنویسید..."
                      className="rounded-xl min-h-[150px]"
                      required
                    />
                  </div>
                  <Button type="submit" size="lg" className="w-full h-14 rounded-xl text-lg">
                    ارسال پیام
                  </Button>
                </form>
              </div>
            </AnimatedSection>

            {/* Contact Info */}
            <div className="space-y-6">
              {contactInfo.map((item, index) => (
                <AnimatedSection key={index} animation="fade-up" delay={index * 100}>
                  <div className="glass-card rounded-2xl p-6 flex items-center gap-6 hover:scale-105 transition-transform duration-300">
                    <div className="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center flex-shrink-0">
                      <item.icon className="w-6 h-6 text-primary" />
                    </div>
                    <div>
                      <h3 className="text-lg font-bold text-foreground mb-1">{item.title}</h3>
                      {item.link ? (
                        <a href={item.link} className="text-muted-foreground hover:text-primary transition-colors">
                          {item.value}
                        </a>
                      ) : (
                        <p className="text-muted-foreground">{item.value}</p>
                      )}
                    </div>
                  </div>
                </AnimatedSection>
              ))}

              {/* Social Media */}
              <AnimatedSection animation="fade-up" delay={400}>
                <div className="glass-card rounded-2xl p-6">
                  <h3 className="text-lg font-bold text-foreground mb-4">ما را دنبال کنید</h3>
                  <div className="flex gap-4">
                    <a
                      href="#"
                      className="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center hover:bg-primary hover:text-primary-foreground transition-colors"
                    >
                      <Instagram className="w-5 h-5" />
                    </a>
                    <a
                      href="#"
                      className="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center hover:bg-primary hover:text-primary-foreground transition-colors"
                    >
                      <Send className="w-5 h-5" />
                    </a>
                  </div>
                </div>
              </AnimatedSection>

              {/* Map */}
              <AnimatedSection animation="fade-up" delay={500}>
                <div className="glass-card rounded-2xl overflow-hidden">
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3214.8!2d53.06!3d36.56!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDMzJzM2LjAiTiA1M8KwMDMnMzYuMCJF!5e0!3m2!1sen!2sir!4v1234567890"
                    width="100%"
                    height="250"
                    style={{ border: 0 }}
                    allowFullScreen
                    loading="lazy"
                    referrerPolicy="no-referrer-when-downgrade"
                    className="grayscale"
                  />
                </div>
              </AnimatedSection>
            </div>
          </div>
        </section>
      </main>

      <Footer />
      <FloatingToolbar />
    </div>
  );
};

export default Contact;
