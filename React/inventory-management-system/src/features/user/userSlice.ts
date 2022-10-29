// userSlice.js
import { createSlice } from "@reduxjs/toolkit";
import { userLogin } from "./userActions";

console.log(userLogin, "user Login");

// initialize userToken from local storage
const userToken = localStorage.getItem("userToken")
  ? localStorage.getItem("userToken")
  : null;

const initialState = {
  loading: false,
  userInfo: null,
  userToken,
  error: null,
  success: false,
};

const userSlice = createSlice({
  name: "user",
  initialState,
  reducers: {},
  extraReducers: {
    // login user
    // [userLogin.pending]: (state: any) => {
    //   state.loading = true;
    //   state.error = null;
    // },
    // [userLogin.fulfilled]: (state: any, { payload }: any) => {
    //   state.loading = false;
    //   state.userInfo = payload;
    //   state.userToken = payload.userToken;
    // },
    // [userLogin.rejected]: (state: any, { payload }: any) => {
    //   state.loading = false;
    //   state.error = payload;
    // },
    // register user reducer...
  },
});
export default userSlice.reducer;
