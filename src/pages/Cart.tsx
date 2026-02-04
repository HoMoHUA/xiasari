import { useState } from "react";
import { Link } from "react-router-dom";
import Header from "@/components/landing/Header";
import Footer from "@/components/landing/Footer";
import FloatingToolbar from "@/components/landing/MobileToolbar";
import AnimatedSection from "@/components/ui/AnimatedSection";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Trash2, Plus, Minus, ShoppingBag, ArrowLeft } from "lucide-react";

import xiaomi14Ultra from "@/assets/products/xiaomi-14-ultra.jpg";
import redmiNote13Pro from "@/assets/products/redmi-note-13-pro.jpg";

interface CartItem {
  id: number;
  name: string;
  price: string;
  priceNumber: number;
  image: string;
  quantity: number;
  color: string;
}

const Cart = () => {
  const [cartItems, setCartItems] = useState<CartItem[]>([
    {
      id: 1,
      name: "Xiaomi 14 Ultra",
      price: "۴۵,۹۰۰,۰۰۰",
      priceNumber: 45900000,
      image: xiaomi14Ultra,
      quantity: 1,
      color: "مشکی"
    },
    {
      id: 4,
      name: "Redmi Note 13 Pro+",
      price: "۱۸,۹۰۰,۰۰۰",
      priceNumber: 18900000,
      image: redmiNote13Pro,
      quantity: 2,
      color: "بنفش"
    }
  ]);

  const [discountCode, setDiscountCode] = useState("");

  const updateQuantity = (id: number, delta: number) => {
    setCartItems(items =>
      items.map(item =>
        item.id === id
          ? { ...item, quantity: Math.max(1, item.quantity + delta) }
          : item
      )
    );
  };

  const removeItem = (id: number) => {
    setCartItems(items => items.filter(item => item.id !== id));
  };

  const subtotal = cartItems.reduce((sum, item) => sum + item.priceNumber * item.quantity, 0);
  const shipping = subtotal > 50000000 ? 0 : 500000;
  const total = subtotal + shipping;

  const formatPrice = (num: number) => {
    return num.toLocaleString("fa-IR");
  };

  if (cartItems.length === 0) {
    return (
      <div className="min-h-screen bg-background">
        <Header />
        <main className="pt-32 pb-20">
          <div className="container mx-auto px-4">
            <AnimatedSection animation="fade-up">
              <div className="text-center max-w-lg mx-auto">
                <div className="w-24 h-24 bg-secondary rounded-full flex items-center justify-center mx-auto mb-8">
                  <ShoppingBag className="w-12 h-12 text-muted-foreground" />
                </div>
                <h1 className="text-2xl font-bold text-foreground mb-4">سبد خرید شما خالی است</h1>
                <p className="text-muted-foreground mb-8">
                  به نظر می‌رسد هنوز محصولی به سبد خرید اضافه نکرده‌اید.
                </p>
                <Link to="/shop">
                  <Button size="lg" className="rounded-xl">
                    مشاهده محصولات
                    <ArrowLeft className="w-5 h-5 mr-2" />
                  </Button>
                </Link>
              </div>
            </AnimatedSection>
          </div>
        </main>
        <Footer />
        <FloatingToolbar />
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-background">
      <Header />
      
      <main className="pt-32 pb-20">
        <div className="container mx-auto px-4">
          <AnimatedSection animation="fade-up">
            <h1 className="text-3xl md:text-4xl font-bold text-foreground mb-8">
              سبد <span className="text-primary">خرید</span>
            </h1>
          </AnimatedSection>

          <div className="grid lg:grid-cols-3 gap-8">
            {/* Cart Items */}
            <div className="lg:col-span-2 space-y-6">
              {cartItems.map((item, index) => (
                <AnimatedSection key={item.id} animation="fade-up" delay={index * 100}>
                  <div className="glass-card rounded-2xl p-6">
                    <div className="flex gap-6">
                      {/* Image */}
                      <Link to={`/product/${item.id}`} className="flex-shrink-0">
                        <div className="w-24 h-24 md:w-32 md:h-32 bg-secondary/20 rounded-xl overflow-hidden">
                          <img
                            src={item.image}
                            alt={item.name}
                            className="w-full h-full object-contain p-2"
                          />
                        </div>
                      </Link>

                      {/* Info */}
                      <div className="flex-1 min-w-0">
                        <div className="flex items-start justify-between gap-4">
                          <div>
                            <Link to={`/product/${item.id}`}>
                              <h3 className="text-lg font-bold text-foreground hover:text-primary transition-colors">
                                {item.name}
                              </h3>
                            </Link>
                            <p className="text-muted-foreground text-sm mt-1">رنگ: {item.color}</p>
                          </div>
                          <button
                            onClick={() => removeItem(item.id)}
                            className="text-muted-foreground hover:text-destructive transition-colors"
                          >
                            <Trash2 className="w-5 h-5" />
                          </button>
                        </div>

                        <div className="flex items-center justify-between mt-4">
                          {/* Quantity */}
                          <div className="flex items-center gap-3">
                            <button
                              onClick={() => updateQuantity(item.id, -1)}
                              className="w-10 h-10 rounded-xl bg-secondary flex items-center justify-center hover:bg-secondary/80 transition-colors"
                            >
                              <Minus className="w-4 h-4" />
                            </button>
                            <span className="text-lg font-bold w-8 text-center">{item.quantity}</span>
                            <button
                              onClick={() => updateQuantity(item.id, 1)}
                              className="w-10 h-10 rounded-xl bg-secondary flex items-center justify-center hover:bg-secondary/80 transition-colors"
                            >
                              <Plus className="w-4 h-4" />
                            </button>
                          </div>

                          {/* Price */}
                          <p className="text-xl font-bold text-primary">
                            {formatPrice(item.priceNumber * item.quantity)} تومان
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </AnimatedSection>
              ))}
            </div>

            {/* Order Summary */}
            <div>
              <AnimatedSection animation="fade-up" delay={200}>
                <div className="glass-card rounded-2xl p-6 sticky top-32">
                  <h2 className="text-xl font-bold text-foreground mb-6">خلاصه سفارش</h2>

                  {/* Discount Code */}
                  <div className="mb-6">
                    <label className="block text-sm font-medium text-foreground mb-2">
                      کد تخفیف
                    </label>
                    <div className="flex gap-2">
                      <Input
                        value={discountCode}
                        onChange={(e) => setDiscountCode(e.target.value)}
                        placeholder="کد تخفیف را وارد کنید"
                        className="rounded-xl"
                      />
                      <Button variant="secondary" className="rounded-xl px-6">
                        اعمال
                      </Button>
                    </div>
                  </div>

                  <div className="space-y-4 border-t border-border pt-6">
                    <div className="flex justify-between text-muted-foreground">
                      <span>جمع محصولات</span>
                      <span>{formatPrice(subtotal)} تومان</span>
                    </div>
                    <div className="flex justify-between text-muted-foreground">
                      <span>هزینه ارسال</span>
                      <span>{shipping === 0 ? "رایگان" : `${formatPrice(shipping)} تومان`}</span>
                    </div>
                    {shipping === 0 && (
                      <p className="text-sm text-green-500">
                        ارسال رایگان برای خرید بالای ۵۰ میلیون تومان
                      </p>
                    )}
                    <div className="border-t border-border pt-4">
                      <div className="flex justify-between text-xl font-bold text-foreground">
                        <span>مجموع</span>
                        <span className="text-primary">{formatPrice(total)} تومان</span>
                      </div>
                    </div>
                  </div>

                  <Button size="lg" className="w-full mt-6 h-14 rounded-xl text-lg">
                    ادامه و پرداخت
                  </Button>

                  <Link to="/shop" className="block mt-4">
                    <Button variant="ghost" className="w-full rounded-xl">
                      ادامه خرید
                    </Button>
                  </Link>
                </div>
              </AnimatedSection>
            </div>
          </div>
        </div>
      </main>

      <Footer />
      <FloatingToolbar />
    </div>
  );
};

export default Cart;
