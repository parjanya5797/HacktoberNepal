import Dashboard from "./layouts/Dashboard/Dashboard";
import SignIn from "./pages/Auth/SignIn/SignIn";
import ProductOrders from "./pages/ProductOrders/ProductOrders";
import ProductSales from "./pages/ProductSales/ProductSales";
import NotFound from "./pages/NotFound/NotFound";

import { Routes, Route } from "react-router-dom";
import RouterGuard from "./utils/RouterGuard";

import type { RootState } from "./app/store";
import { useSelector } from "react-redux";

import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

function App() {
  let userToken = localStorage.getItem("token");

  const token = useSelector((state: RootState) => state.auth.value);
  return (
    <div className="App">
      <ToastContainer />
      <Routes>
        <Route element={<RouterGuard />}>
          <Route element={<Dashboard />} path="/">
            <Route path="/product-orders" element={<ProductOrders />} />
            <Route path="/sales-orders" element={<ProductSales />} />
            <Route path="*" element={<NotFound />} />
          </Route>
        </Route>
        <Route element={<SignIn />} path={userToken ? "/" : "/login"} />
      </Routes>
    </div>
  );
}

export default App;
