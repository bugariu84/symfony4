// State argument is not application state, only the state
// of this reducer
export default function (state = null, action) {
    switch (action.type) {
        case "INIT":
            return ;
        case 'POST_SELECTED':
            return action.payload;
    }

    return state;
}