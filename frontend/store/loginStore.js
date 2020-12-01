export const state = () => ({
  userID: null
});

export const mutations= {
  login(state, userID){
        state.userID = userID;
      this.$router.push({
        path: "/videos"
      });
  },
  logout(state) {
    state.userID = null;
  },
};