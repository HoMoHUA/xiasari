import categoryPhone from "@/assets/category-phone.jpg";
import categoryTv from "@/assets/category-tv.jpg";
import categoryVacuum from "@/assets/category-vacuum.jpg";
import categoryMonitor from "@/assets/category-monitor.jpg";
import categoryAppliances from "@/assets/category-appliances.jpg";

const categories = [
  {
    name: "موبایل",
    image: categoryPhone,
  },
  {
    name: "تلویزیون",
    image: categoryTv,
  },
  {
    name: "جارو رباتیک",
    image: categoryVacuum,
  },
  {
    name: "مانیتور",
    image: categoryMonitor,
  },
  {
    name: "لوازم خانگی",
    image: categoryAppliances,
  },
];

const ProductCategories = () => {
  return (
    <section className="py-20 bg-secondary/30">
      <div className="container mx-auto px-4">
        <h2 className="text-3xl md:text-4xl font-bold text-center mb-16 text-foreground">
          دسته‌بندی <span className="text-primary">محصولات</span>
        </h2>

        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
          {categories.map((category, index) => (
            <a
              key={index}
              href="#"
              className="group relative bg-card rounded-2xl overflow-hidden border border-border hover:border-primary/30 transition-all duration-300 hover:shadow-xl hover:-translate-y-2"
            >
              <div className="aspect-square p-4">
                <img
                  src={category.image}
                  alt={category.name}
                  className="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500"
                />
              </div>
              <div className="absolute inset-x-0 bottom-0 bg-gradient-to-t from-foreground/80 to-transparent p-4">
                <h3 className="text-lg font-bold text-background text-center">
                  {category.name}
                </h3>
              </div>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
};

export default ProductCategories;
