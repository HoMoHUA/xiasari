import { useState } from "react";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Phone, User } from "lucide-react";
import { useToast } from "@/hooks/use-toast";

const LeadForm = () => {
  const [name, setName] = useState("");
  const [phone, setPhone] = useState("");
  const [isSubmitting, setIsSubmitting] = useState(false);
  const { toast } = useToast();

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!phone) {
      toast({
        title: "خطا",
        description: "لطفاً شماره تماس خود را وارد کنید",
        variant: "destructive",
      });
      return;
    }
    
    setIsSubmitting(true);
    // Simulate API call
    setTimeout(() => {
      toast({
        title: "درخواست ثبت شد",
        description: "کارشناسان ما به زودی با شما تماس خواهند گرفت",
      });
      setName("");
      setPhone("");
      setIsSubmitting(false);
    }, 1000);
  };

  return (
    <section className="py-20 bg-primary">
      <div className="container mx-auto px-4">
        <div className="max-w-2xl mx-auto text-center">
          <h2 className="text-3xl md:text-4xl font-bold mb-4 text-primary-foreground">
            نیاز به مشاوره داری؟
          </h2>
          <p className="text-primary-foreground/80 mb-10 text-lg">
            شماره تماس خود را وارد کنید تا کارشناسان ما در اسرع وقت برای مشاوره تخصصی و استعلام قیمت با شما تماس بگیرند.
          </p>

          <form onSubmit={handleSubmit} className="space-y-4">
            <div className="flex flex-col sm:flex-row gap-4">
              <div className="relative flex-1">
                <User className="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                <Input
                  type="text"
                  placeholder="نام شما (اختیاری)"
                  value={name}
                  onChange={(e) => setName(e.target.value)}
                  className="pr-12 h-14 bg-background text-foreground border-0 rounded-xl text-right"
                />
              </div>
              <div className="relative flex-1">
                <Phone className="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                <Input
                  type="tel"
                  placeholder="شماره تماس *"
                  value={phone}
                  onChange={(e) => setPhone(e.target.value)}
                  className="pr-12 h-14 bg-background text-foreground border-0 rounded-xl text-right"
                  required
                />
              </div>
            </div>
            <Button
              type="submit"
              size="xl"
              disabled={isSubmitting}
              className="w-full sm:w-auto bg-background text-primary hover:bg-background/90 font-bold"
            >
              {isSubmitting ? "در حال ارسال..." : "درخواست مشاوره رایگان"}
            </Button>
          </form>
        </div>
      </div>
    </section>
  );
};

export default LeadForm;
