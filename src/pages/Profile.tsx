import { useState } from "react";
import Header from "@/components/landing/Header";
import Footer from "@/components/landing/Footer";
import FloatingToolbar from "@/components/landing/MobileToolbar";
import AnimatedSection from "@/components/ui/AnimatedSection";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { 
  User, 
  Package, 
  Heart, 
  MapPin, 
  Settings, 
  LogOut,
  ChevronLeft,
  Eye
} from "lucide-react";
import { Link } from "react-router-dom";

import xiaomi14Ultra from "@/assets/products/xiaomi-14-ultra.jpg";
import redmiNote13Pro from "@/assets/products/redmi-note-13-pro.jpg";

const Profile = () => {
  const [activeTab, setActiveTab] = useState("profile");

  const menuItems = [
    { id: "profile", label: "اطلاعات حساب", icon: User },
    { id: "orders", label: "سفارش‌های من", icon: Package },
    { id: "wishlist", label: "علاقه‌مندی‌ها", icon: Heart },
    { id: "addresses", label: "آدرس‌های من", icon: MapPin },
    { id: "settings", label: "تنظیمات", icon: Settings },
  ];

  const orders = [
    {
      id: "ORD-1234",
      date: "۱۴۰۳/۰۹/۱۵",
      status: "تحویل شده",
      statusColor: "text-green-500",
      total: "۴۵,۹۰۰,۰۰۰",
      items: [
        { name: "Xiaomi 14 Ultra", image: xiaomi14Ultra }
      ]
    },
    {
      id: "ORD-1235",
      date: "۱۴۰۳/۰۹/۱۰",
      status: "در حال ارسال",
      statusColor: "text-primary",
      total: "۱۸,۹۰۰,۰۰۰",
      items: [
        { name: "Redmi Note 13 Pro+", image: redmiNote13Pro }
      ]
    }
  ];

  const wishlistItems = [
    { id: 1, name: "Xiaomi 14 Ultra", price: "۴۵,۹۰۰,۰۰۰", image: xiaomi14Ultra },
    { id: 4, name: "Redmi Note 13 Pro+", price: "۱۸,۹۰۰,۰۰۰", image: redmiNote13Pro }
  ];

  const renderContent = () => {
    switch (activeTab) {
      case "profile":
        return (
          <div className="space-y-6">
            <h2 className="text-2xl font-bold text-foreground">اطلاعات حساب کاربری</h2>
            <div className="grid md:grid-cols-2 gap-6">
              <div>
                <label className="block text-sm font-medium text-foreground mb-2">نام</label>
                <Input defaultValue="علی" className="rounded-xl h-12" />
              </div>
              <div>
                <label className="block text-sm font-medium text-foreground mb-2">نام خانوادگی</label>
                <Input defaultValue="محمدی" className="rounded-xl h-12" />
              </div>
              <div>
                <label className="block text-sm font-medium text-foreground mb-2">شماره موبایل</label>
                <Input defaultValue="۰۹۱۲۳۴۵۶۷۸۹" className="rounded-xl h-12" />
              </div>
              <div>
                <label className="block text-sm font-medium text-foreground mb-2">ایمیل</label>
                <Input defaultValue="ali@example.com" className="rounded-xl h-12" />
              </div>
            </div>
            <Button className="rounded-xl">ذخیره تغییرات</Button>
          </div>
        );

      case "orders":
        return (
          <div className="space-y-6">
            <h2 className="text-2xl font-bold text-foreground">سفارش‌های من</h2>
            {orders.map((order) => (
              <div key={order.id} className="glass-card rounded-2xl p-6">
                <div className="flex items-center justify-between mb-4">
                  <div className="flex items-center gap-4">
                    <span className="text-muted-foreground">شماره سفارش:</span>
                    <span className="font-bold text-foreground">{order.id}</span>
                  </div>
                  <span className={`font-medium ${order.statusColor}`}>{order.status}</span>
                </div>
                <div className="flex items-center gap-4 mb-4">
                  {order.items.map((item, i) => (
                    <div key={i} className="w-16 h-16 bg-secondary/20 rounded-xl overflow-hidden">
                      <img src={item.image} alt={item.name} className="w-full h-full object-contain p-2" />
                    </div>
                  ))}
                </div>
                <div className="flex items-center justify-between pt-4 border-t border-border">
                  <span className="text-muted-foreground">{order.date}</span>
                  <span className="text-lg font-bold text-primary">{order.total} تومان</span>
                </div>
              </div>
            ))}
          </div>
        );

      case "wishlist":
        return (
          <div className="space-y-6">
            <h2 className="text-2xl font-bold text-foreground">علاقه‌مندی‌ها</h2>
            <div className="grid sm:grid-cols-2 gap-6">
              {wishlistItems.map((item) => (
                <div key={item.id} className="glass-card rounded-2xl p-6 flex gap-4">
                  <div className="w-24 h-24 bg-secondary/20 rounded-xl overflow-hidden flex-shrink-0">
                    <img src={item.image} alt={item.name} className="w-full h-full object-contain p-2" />
                  </div>
                  <div className="flex-1">
                    <h3 className="font-bold text-foreground mb-2">{item.name}</h3>
                    <p className="text-primary font-bold">{item.price} تومان</p>
                    <Link to={`/product/${item.id}`}>
                      <Button size="sm" variant="ghost" className="mt-2 rounded-xl">
                        <Eye className="w-4 h-4 ml-2" />
                        مشاهده
                      </Button>
                    </Link>
                  </div>
                </div>
              ))}
            </div>
          </div>
        );

      case "addresses":
        return (
          <div className="space-y-6">
            <div className="flex items-center justify-between">
              <h2 className="text-2xl font-bold text-foreground">آدرس‌های من</h2>
              <Button className="rounded-xl">افزودن آدرس جدید</Button>
            </div>
            <div className="glass-card rounded-2xl p-6">
              <div className="flex items-start justify-between">
                <div>
                  <div className="flex items-center gap-2 mb-2">
                    <span className="bg-primary/10 text-primary text-xs px-2 py-1 rounded-full">پیش‌فرض</span>
                    <h3 className="font-bold text-foreground">منزل</h3>
                  </div>
                  <p className="text-muted-foreground">ساری، خیابان فرهنگ، پلاک ۱۲۳</p>
                  <p className="text-muted-foreground mt-1">علی محمدی - ۰۹۱۲۳۴۵۶۷۸۹</p>
                </div>
                <Button variant="ghost" size="sm" className="rounded-xl">
                  ویرایش
                </Button>
              </div>
            </div>
          </div>
        );

      case "settings":
        return (
          <div className="space-y-6">
            <h2 className="text-2xl font-bold text-foreground">تنظیمات</h2>
            <div className="glass-card rounded-2xl p-6 space-y-6">
              <div className="flex items-center justify-between">
                <div>
                  <h3 className="font-bold text-foreground">اعلان‌های ایمیل</h3>
                  <p className="text-sm text-muted-foreground">دریافت ایمیل برای سفارش‌ها و تخفیف‌ها</p>
                </div>
                <input type="checkbox" defaultChecked className="w-5 h-5 accent-primary" />
              </div>
              <div className="flex items-center justify-between">
                <div>
                  <h3 className="font-bold text-foreground">اعلان‌های پیامک</h3>
                  <p className="text-sm text-muted-foreground">دریافت پیامک برای وضعیت سفارش</p>
                </div>
                <input type="checkbox" defaultChecked className="w-5 h-5 accent-primary" />
              </div>
            </div>
            <Button variant="destructive" className="rounded-xl">
              <LogOut className="w-4 h-4 ml-2" />
              خروج از حساب کاربری
            </Button>
          </div>
        );

      default:
        return null;
    }
  };

  return (
    <div className="min-h-screen bg-background">
      <Header />
      
      <main className="pt-32 pb-20">
        <div className="container mx-auto px-4">
          <AnimatedSection animation="fade-up">
            <h1 className="text-3xl md:text-4xl font-bold text-foreground mb-8">
              حساب <span className="text-primary">کاربری</span>
            </h1>
          </AnimatedSection>

          <div className="grid lg:grid-cols-4 gap-8">
            {/* Sidebar */}
            <AnimatedSection animation="fade-up" delay={100}>
              <div className="glass-card rounded-2xl p-6">
                {/* User Info */}
                <div className="flex items-center gap-4 pb-6 border-b border-border mb-6">
                  <div className="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center">
                    <User className="w-8 h-8 text-primary" />
                  </div>
                  <div>
                    <h3 className="font-bold text-foreground">علی محمدی</h3>
                    <p className="text-sm text-muted-foreground">۰۹۱۲۳۴۵۶۷۸۹</p>
                  </div>
                </div>

                {/* Menu */}
                <nav className="space-y-2">
                  {menuItems.map((item) => (
                    <button
                      key={item.id}
                      onClick={() => setActiveTab(item.id)}
                      className={`w-full flex items-center justify-between p-3 rounded-xl transition-colors ${
                        activeTab === item.id
                          ? "bg-primary/10 text-primary"
                          : "text-muted-foreground hover:bg-secondary"
                      }`}
                    >
                      <div className="flex items-center gap-3">
                        <item.icon className="w-5 h-5" />
                        <span>{item.label}</span>
                      </div>
                      <ChevronLeft className="w-4 h-4" />
                    </button>
                  ))}
                </nav>
              </div>
            </AnimatedSection>

            {/* Content */}
            <div className="lg:col-span-3">
              <AnimatedSection animation="fade-up" delay={200}>
                <div className="glass-card rounded-2xl p-8">
                  {renderContent()}
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

export default Profile;
