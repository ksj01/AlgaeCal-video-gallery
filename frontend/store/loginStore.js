export const state = () => ({
  userID: null
});

export const mutations= {
  login(state, userID){
    fetch('http://localhost:8080/users?username=' + userID)
    .then(response => response.json())
    .then(responseData => {
      if (responseData.statusCode == 200) {
        alert('success');
        state.userID = userID;
        window.location.href = "http://localhost:3000/videos";
      }
      else {
        alert('failure');
      }
    });
  },
  logout(state) {
    state.userID = null;
  },
};