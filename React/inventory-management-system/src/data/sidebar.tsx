import ShoppingCartOutlined from "@mui/icons-material/ShoppingCartOutlined";
import Star from "@mui/icons-material/Star";
import Dashboard from "@mui/icons-material/Dashboard";
const sidebarLinks = [
  {
    title: "Dashboard",
    icon: <Dashboard />,
    url: "/",
  },
  {
    title: "Product Orders",
    icon: <ShoppingCartOutlined />,
    url: "/product-orders",
  },
  {
    title: "Sales Orders",
    icon: <Star />,
    url: "/sales-orders",
  },
];

export default sidebarLinks;
