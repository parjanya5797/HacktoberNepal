import { Breadcrumbs as MUIBreadcrumbs } from "@mui/material";
import NavigateNextIcon from "@mui/icons-material/NavigateNext";
import { Typography } from "@mui/material";
import Link from "@mui/material/Link";
import { useLocation, useNavigate } from "react-router";

const Breadcrumbs = () => {
  const location = useLocation();
  const navigate = useNavigate();
  const pathnames = location.pathname.split("/").filter((x) => x);

  const textCapitalize = () => {
    const titleToArray = pathnames[pathnames.length - 1].split("-");
    let uppercasedArray = [];
    titleToArray.forEach((item) => {
      item = item[0].toUpperCase() + item.slice(1, item.length + 1);
      uppercasedArray.push(item);
    });
    const combinedText = uppercasedArray.join(" ");
    return combinedText;
  };

  return (
    <>
      <Typography variant="h6">
        {pathnames.length ? textCapitalize() : "Home"}
      </Typography>
      <MUIBreadcrumbs
        separator={<NavigateNextIcon fontSize="small" />}
        aria-label="breadcrumb"
      >
        <Link
          underline="hover"
          onClick={() => {
            navigate(`/`);
          }}
          key="1"
          color="inherit"
        >
          Home
        </Link>
        {pathnames.map((item, index) => {
          const routeTo = `/${pathnames.slice(0, index + 1).join("/")}`;
          const isLast = index === pathnames.length - 1;

          return !isLast ? (
            <Link
              underline="hover"
              color="inherit"
              key={index}
              onClick={() => {
                navigate(routeTo);
              }}
            >
              {item}
            </Link>
          ) : (
            <Typography key="3" color="text.primary">
              {textCapitalize()}
            </Typography>
          );
        })}
        {/* {pathnames.length >= 1 ? (
        <Link underline="hover" key="2" color="inherit">
          Core
        </Link>
      ) : (
        <Typography key="3" color="text.primary">
          Breadcrumb
        </Typography>
      )} */}
      </MUIBreadcrumbs>
    </>
  );
};

export default Breadcrumbs;
