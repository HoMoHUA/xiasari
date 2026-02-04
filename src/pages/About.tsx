import Header from "@/components/landing/Header";
import Footer from "@/components/landing/Footer";
import FloatingToolbar from "@/components/landing/MobileToolbar";
import AnimatedSection from "@/components/ui/AnimatedSection";
import { Users, Award, Target, Heart } from "lucide-react";

const About = () => {
  const values = [
    {
      icon: Target,
      title: "ماموریت ما",
      description: "ارائه بهترین محصولات شیائومی با قیمت مناسب و خدمات پس از فروش عالی"
    },
    {
      icon: Heart,
      title: "ارزش‌های ما",
      description: "صداقت، کیفیت و رضایت مشتری در اولویت کار ماست"
    },
    {
      icon: Award,
      title: "تضمین کیفیت",
      description: "تمامی محصولات دارای گارانتی اصالت و ضمانت بازگشت کالا هستند"
    },
    {
      icon: Users,
      title: "تیم ما",
      description: "تیمی متعهد و متخصص برای ارائه بهترین خدمات به شما"
    }
  ];

  const stats = [
    { number: "۵+", label: "سال تجربه" },
    { number: "۱۰,۰۰۰+", label: "مشتری راضی" },
    { number: "۵۰۰+", label: "محصول" },
    { number: "۹۸٪", label: "رضایت مشتری" }
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
                درباره <span className="text-primary">شیائومی ساری</span>
              </h1>
              <p className="text-xl text-muted-foreground leading-relaxed">
                فروشگاه تخصصی محصولات شیائومی در ساری. ما با بیش از ۵ سال تجربه در زمینه فروش 
                محصولات شیائومی، بهترین خدمات را به شما ارائه می‌دهیم.
              </p>
            </div>
          </AnimatedSection>
        </section>

        {/* Stats Section */}
        <section className="py-16 bg-secondary/30">
          <div className="container mx-auto px-4">
            <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
              {stats.map((stat, index) => (
                <AnimatedSection key={index} animation="scale-in" delay={index * 100}>
                  <div className="text-center">
                    <div className="text-4xl md:text-5xl font-bold text-primary mb-2">{stat.number}</div>
                    <div className="text-muted-foreground">{stat.label}</div>
                  </div>
                </AnimatedSection>
              ))}
            </div>
          </div>
        </section>

        {/* Values Section */}
        <section className="py-20">
          <div className="container mx-auto px-4">
            <AnimatedSection animation="fade-up">
              <h2 className="text-3xl md:text-4xl font-bold text-center mb-16 text-foreground">
                ارزش‌ها و <span className="text-primary">اهداف ما</span>
              </h2>
            </AnimatedSection>

            <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
              {values.map((value, index) => (
                <AnimatedSection key={index} animation="fade-up" delay={index * 100}>
                  <div className="glass-card rounded-2xl p-8 text-center hover:scale-105 transition-transform duration-300">
                    <div className="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                      <value.icon className="w-8 h-8 text-primary" />
                    </div>
                    <h3 className="text-xl font-bold text-foreground mb-4">{value.title}</h3>
                    <p className="text-muted-foreground">{value.description}</p>
                  </div>
                </AnimatedSection>
              ))}
            </div>
          </div>
        </section>

        {/* Story Section */}
        <section className="py-20 bg-secondary/30">
          <div className="container mx-auto px-4">
            <div className="max-w-4xl mx-auto">
              <AnimatedSection animation="fade-up">
                <h2 className="text-3xl md:text-4xl font-bold text-center mb-12 text-foreground">
                  داستان <span className="text-primary">ما</span>
                </h2>
                <div className="glass-card rounded-3xl p-8 md:p-12">
                  <p className="text-lg text-muted-foreground leading-relaxed mb-6">
                    فروشگاه شیائومی ساری در سال ۱۳۹۸ با هدف ارائه محصولات اورجینال شیائومی به مردم عزیز مازندران 
                    تاسیس شد. ما از ابتدا متعهد به ارائه محصولات با کیفیت و قیمت مناسب بوده‌ایم.
                  </p>
                  <p className="text-lg text-muted-foreground leading-relaxed mb-6">
                    امروز، ما به یکی از معتبرترین فروشگاه‌های تخصصی شیائومی در شمال کشور تبدیل شده‌ایم و 
                    افتخار داریم که بیش از ۱۰,۰۰۰ مشتری راضی داریم.
                  </p>
                  <p className="text-lg text-muted-foreground leading-relaxed">
                    تیم ما متشکل از متخصصین با تجربه در زمینه تکنولوژی و خدمات مشتری است که همواره 
                    آماده پاسخگویی به سوالات و نیازهای شما هستند.
                  </p>
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

export default About;
