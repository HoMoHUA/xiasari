import { useState } from "react";
import { ChevronLeft, ChevronRight, Quote } from "lucide-react";

const testimonials = [
  {
    id: 1,
    name: "علی محمدی",
    text: "خرید موبایل از شیائومی ساری یکی از بهترین تجربه‌های خریدم بود. قیمت واقعاً رقابتی بود و کالا اصل.",
    rating: 5,
  },
  {
    id: 2,
    name: "مریم احمدی",
    text: "تلویزیون شیائومی که خریدم عالی بود. پشتیبانی فروشگاه هم خیلی سریع و حرفه‌ای پاسخگو بودند.",
    rating: 5,
  },
  {
    id: 3,
    name: "رضا کریمی",
    text: "جارو رباتیک Roborock خریدم و کاملاً راضی هستم. مشاوره قبل از خرید خیلی کمک کرد.",
    rating: 5,
  },
];

const Testimonials = () => {
  const [currentIndex, setCurrentIndex] = useState(0);

  const nextSlide = () => {
    setCurrentIndex((prev) => (prev + 1) % testimonials.length);
  };

  const prevSlide = () => {
    setCurrentIndex((prev) => (prev - 1 + testimonials.length) % testimonials.length);
  };

  return (
    <section className="py-20 bg-secondary/30">
      <div className="container mx-auto px-4">
        <h2 className="text-3xl md:text-4xl font-bold text-center mb-16 text-foreground">
          تجربه خرید <span className="text-primary">مشتریان ما</span>
        </h2>

        <div className="max-w-3xl mx-auto relative">
          {/* Testimonial Card */}
          <div className="bg-card rounded-3xl p-8 md:p-12 shadow-lg border border-border">
            <Quote className="w-12 h-12 text-primary/20 mb-6" />
            <p className="text-xl md:text-2xl text-card-foreground leading-relaxed mb-8">
              {testimonials[currentIndex].text}
            </p>
            <div className="flex items-center justify-between">
              <div>
                <p className="font-bold text-lg text-card-foreground">
                  {testimonials[currentIndex].name}
                </p>
                <div className="flex gap-1 mt-1">
                  {[...Array(testimonials[currentIndex].rating)].map((_, i) => (
                    <span key={i} className="text-primary">★</span>
                  ))}
                </div>
              </div>
              
              {/* Navigation */}
              <div className="flex gap-2">
                <button
                  onClick={prevSlide}
                  className="w-12 h-12 rounded-full bg-secondary hover:bg-primary hover:text-primary-foreground transition-colors flex items-center justify-center"
                >
                  <ChevronRight className="w-6 h-6" />
                </button>
                <button
                  onClick={nextSlide}
                  className="w-12 h-12 rounded-full bg-secondary hover:bg-primary hover:text-primary-foreground transition-colors flex items-center justify-center"
                >
                  <ChevronLeft className="w-6 h-6" />
                </button>
              </div>
            </div>
          </div>

          {/* Dots */}
          <div className="flex justify-center gap-2 mt-8">
            {testimonials.map((_, index) => (
              <button
                key={index}
                onClick={() => setCurrentIndex(index)}
                className={`w-3 h-3 rounded-full transition-all ${
                  index === currentIndex 
                    ? "bg-primary w-8" 
                    : "bg-muted-foreground/30 hover:bg-muted-foreground/50"
                }`}
              />
            ))}
          </div>
        </div>
      </div>
    </section>
  );
};

export default Testimonials;
