import Header from "@/components/landing/Header";
import HeroSection from "@/components/landing/HeroSection";
import ValueProposition from "@/components/landing/ValueProposition";
import ProductCategories from "@/components/landing/ProductCategories";
import FeaturedProducts from "@/components/landing/FeaturedProducts";
import LeadForm from "@/components/landing/LeadForm";
import Testimonials from "@/components/landing/Testimonials";
import FAQ from "@/components/landing/FAQ";
import Footer from "@/components/landing/Footer";
import FloatingToolbar from "@/components/landing/MobileToolbar";

const Index = () => {
  return (
    <div className="min-h-screen">
      <Header />
      <main>
        <HeroSection />
        <ValueProposition />
        <ProductCategories />
        <FeaturedProducts />
        <LeadForm />
        <Testimonials />
        <FAQ />
      </main>
      <Footer />
      <FloatingToolbar />
    </div>
  );
};

export default Index;
