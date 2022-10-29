import { Navigate, Outlet, useLocation } from "react-router-dom";

const RouterGuard = () => {
  let isLoggedIn = false;
  const location = useLocation();

  const userToken = localStorage.getItem("token");
  userToken ? (isLoggedIn = true) : (isLoggedIn = false);

  return isLoggedIn ? (
    location.pathname === "/login" ? (
      <Navigate to="/" />
    ) : (
      <Outlet />
    )
  ) : (
    <Navigate to="/login" />
  );
};

export default RouterGuard;
