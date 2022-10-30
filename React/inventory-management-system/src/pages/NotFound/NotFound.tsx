import { Container, Grid, Box, Typography, Button } from "@mui/material";
import { Link } from "react-router-dom";

const NotFound = () => {
  return (
    <Box
      sx={{
        display: "flex",
        justifyContent: "center",
        alignItems: "center",
        minHeight: "60vh",
      }}
    >
      <Container maxWidth="md">
        <Grid container spacing={2} sx={{ alignItems: "center" }}>
          <Grid xs={6}>
            <Typography variant="h1">404</Typography>
            <Typography variant="h6">
              The page you’re looking for doesn’t exist.
            </Typography>
            <Link to="/" style={{ textDecoration: "none" }}>
              <Button variant="contained" sx={{ marginTop: "10px" }}>
                Back Home
              </Button>
            </Link>
          </Grid>
          <Grid xs={6}>
            <img src="/404.jpg" alt="" height={450} />
          </Grid>
        </Grid>
      </Container>
    </Box>
  );
};

export default NotFound;
