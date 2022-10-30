import { createSlice } from "@reduxjs/toolkit";
import type { PayloadAction } from "@reduxjs/toolkit";

export interface authState {
  value: string;
}

const initialState: authState = {
  value: "",
};

export const authSlice = createSlice({
  name: "auth",
  initialState,
  reducers: {
    getToken: (state) => {
      state.value = "token";
    },
  },
});

// Action creators are generated for each case reducer function
export const { getToken } = authSlice.actions;

export default authSlice.reducer;
