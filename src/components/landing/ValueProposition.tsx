import { BadgeCheck, Coins, Layers } from "lucide-react";
import AnimatedSection from "@/components/ui/AnimatedSection";

const values = [
  {
    icon: Coins,
    title: "قیمت رقابتی",
    description: "تضمین بهترین قیمت در بازار",
  },
  {
    icon: Layers,
    title: "تنوع کامل",
    description: "دسترسی به تمام محصولات شیائومی",
  },
  {
    icon: BadgeCheck,
    title: "اصالت کالا",
    description: "ضمانت اصالت و گارانتی معتبر",
  },
];

const ValueProposition = () => {
  return (
    <section id="about" className="py-20 bg-background">
      <div className="container mx-auto px-4">
        <AnimatedSection animation="fade-up">
          <h2 className="text-3xl md:text-4xl font-bold text-center mb-16 text-foreground">
            چرا <span className="text-primary">شیائومی ساری</span>؟
          </h2>
        </AnimatedSection>

        <div className="grid md:grid-cols-3 gap-8">
          {values.map((value, index) => (
            <AnimatedSection key={index} animation="fade-up" delay={index * 150}>
              <div className="group p-8 bg-card rounded-2xl border border-border hover:border-primary/30 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div className="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary/20 transition-colors duration-300">
                  <value.icon className="w-8 h-8 text-primary" />
                </div>
                <h3 className="text-xl font-bold mb-3 text-card-foreground">{value.title}</h3>
                <p className="text-muted-foreground leading-relaxed">{value.description}</p>
              </div>
            </AnimatedSection>
          ))}
        </div>
      </div>
    </section>
  );
};

export default ValueProposition;
