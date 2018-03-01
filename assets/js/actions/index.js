export function selectPost(post) {
    // selectBook is a ActionCreator, it need to return an action
    // an object with a type property.

    return {
      type: 'POST_SELECTED',
      payload: post
    };
}