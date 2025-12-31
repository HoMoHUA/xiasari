import {
  Accordion,
  AccordionContent,
  AccordionItem,
  AccordionTrigger,
} from "@/components/ui/accordion";

const faqs = [
  {
    question: "آیا محصولات شما اصل هستند؟",
    answer: "بله، تمام محصولات ما کاملاً اصل و دارای گارانتی معتبر هستند. ما مستقیماً از نمایندگی‌های رسمی شیائومی تأمین می‌کنیم.",
  },
  {
    question: "نحوه ارسال و زمان تحویل چگونه است؟",
    answer: "ارسال در ساری رایگان و تحویل در همان روز انجام می‌شود. برای سایر شهرها، ارسال توسط پست پیشتاز ظرف ۲ تا ۴ روز کاری انجام می‌گیرد.",
  },
  {
    question: "شرایط گارانتی محصولات چگونه است؟",
    answer: "تمام محصولات دارای ۱۸ ماه گارانتی رسمی شرکتی هستند. در صورت بروز هرگونه مشکل، می‌توانید به مراکز خدمات مجاز مراجعه کنید.",
  },
  {
    question: "آیا امکان خرید اقساطی وجود دارد؟",
    answer: "بله، امکان خرید اقساطی با کارت‌های اعتباری بانک‌های طرف قرارداد وجود دارد. برای اطلاعات بیشتر با ما تماس بگیرید.",
  },
  {
    question: "چگونه می‌توانم از اصالت کالا مطمئن شوم؟",
    answer: "تمام محصولات دارای کد رهگیری اصالت هستند که می‌توانید از طریق سایت رسمی شیائومی آن را بررسی کنید. همچنین هولوگرام اصالت روی تمام بسته‌بندی‌ها موجود است.",
  },
];

const FAQ = () => {
  return (
    <section className="py-20 bg-background">
      <div className="container mx-auto px-4">
        <h2 className="text-3xl md:text-4xl font-bold text-center mb-16 text-foreground">
          سوالات <span className="text-primary">متداول</span>
        </h2>

        <div className="max-w-3xl mx-auto">
          <Accordion type="single" collapsible className="space-y-4">
            {faqs.map((faq, index) => (
              <AccordionItem
                key={index}
                value={`item-${index}`}
                className="bg-card border border-border rounded-xl px-6 data-[state=open]:border-primary/30"
              >
                <AccordionTrigger className="text-right text-lg font-medium py-6 hover:no-underline hover:text-primary">
                  {faq.question}
                </AccordionTrigger>
                <AccordionContent className="text-muted-foreground pb-6 leading-relaxed">
                  {faq.answer}
                </AccordionContent>
              </AccordionItem>
            ))}
          </Accordion>
        </div>
      </div>
    </section>
  );
};

export default FAQ;
