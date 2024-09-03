@extends('frontend.app', ['title' => 'Community'])

@section('main')

<main class="container bi-community-page">
    <!-- share post starts -->
    <form class="bi-share-post-container">
      <div class="bi-avatar">
        <img src="assets/images/bi-community-page-avatar.png" alt="" srcset="" />
        <input type="text" placeholder="Let's share what going on your mind...." />
      </div>
      <a href="#">
        <span>Share</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="111" height="16" viewBox="0 0 111 16" fill="none">
          <path
            d="M110.707 8.70711C111.098 8.31658 111.098 7.68342 110.707 7.29289L104.343 0.928932C103.953 0.538408 103.319 0.538408 102.929 0.928932C102.538 1.31946 102.538 1.95262 102.929 2.34315L108.586 8L102.929 13.6569C102.538 14.0474 102.538 14.6805 102.929 15.0711C103.319 15.4616 103.953 15.4616 104.343 15.0711L110.707 8.70711ZM0 9H110V7H0V9Z"
            fill="#222222" />
        </svg>
      </a>
    </form>
    <!-- share post ends -->
    <!-- recent and trending post starts -->
    <div class="bi-recent-post-container">
      <h1>Recent Post</h1>
      <div class="bi-trending-and-recent-container">
        <!-- recent container starts -->
        <div class="bi-recent-posts-container">
          <!-- post 1 -->

          <!-- post 2 -->

          <!-- post 3 -->
          <div class="bi-recent-post">
            <div class="bi-user-info">
              <div class="user-image">
                <img src="assets/images/bi-recent-post-user-avatar.png" alt="" srcset="" />
              </div>
              <a href="#">
                <span class="user-name">Wade Warren</span>
                <span class="time">3 weeks ago</span>
              </a>
            </div>
            <h3>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </h3>
            <button class="view-full">View full Page</button>
            <!-- recent post cover if view clicked -->
            <div class="bi-recent-post-cover">
              <img src="assets/images/bi-recent-post-cover-image.png" alt="" />
            </div>

            <div class="bi-post-tags">
              <a href="">tag 1</a>
              <a href="">tag 1</a>
              <a href="">tag 1</a>
              <a href="">tag 1</a>
            </div>

            <!-- recent post description -->
            <div class="bi-recent-post-description">
              <span>Typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown
                printer took a galley of type and scrambled it to make a type
                specimen book. It has survived not only five centuries, but
                also the leap into electronic typesetting, remaining
                essentially unchanged.</span>
              <span><a href="fullpost.html">See more</a></span>
            </div>
            <div class="post-view-like-comments">
              <span>651,563 Views</span>
              <span>651,563 Likes</span>
              <span>651,563 Comments</span>
            </div>
            <form class="bi-add-comment-container">
              <input type="text" placeholder="Add a Comment" />
              <button type="submit">Add Comment</button>
            </form>
            <div class="bi-comments-container">
              <h2>Comments</h2>
              <div class="blog-comment-wrapper">
                <div class="blog-main-comment blog-common-comment d-flex">
                  <img src="assets/images/comment-profile-avatar.png" alt="" srcset="" />
                  <div class="blog-main-comment-wrapper">
                    <div class="blog-comment-author-date d-flex">
                      <h4>Isabel Miller</h4>
                      <h6>- August 14,2019</h6>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing
                      elit. Curabitur orci leo, tristique eget ligula eu,
                      cursus posuere nisi. Cras fermentum suscipit nisl, vel
                      egestas nulla dapibus non. Aliquam diam orci, lobortis
                      sed metus vitae, rutrum condimentum sem.
                    </p>
                    <h5>2 Reply</h5>
                  </div>
                </div>
                <div class="blog-comment-reply blog-common-comment">
                  <img src="assets/images/comment-profile-avatar.png" alt="" srcset="" />
                  <div class="blog-main-comment-wrapper">
                    <div class="blog-comment-author-date d-flex">
                      <h4>Isabel Miller</h4>
                      <h6>- August 14,2019</h6>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing
                      elit. Curabitur orci leo, tristique eget ligula eu,
                      cursus posuere nisi. Cras fermentum suscipit nisl, vel
                      egestas nulla dapibus non. Aliquam diam orci, lobortis
                      sed metus vitae, rutrum condimentum sem. 
                    </p>
                    <h5>1 Reply</h5>
                  </div>
                </div>
                <div class="blog-comment-reply blog-common-comment">
                  <img src="assets/images/comment-profile-avatar.png" alt="" srcset="" />
                  <div class="blog-main-comment-wrapper">
                    <div class="blog-comment-author-date d-flex">
                      <h4>Isabel Miller</h4>
                      <h6>- August 14,2019</h6>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing
                      elit. Curabitur orci leo, tristique eget ligula eu,
                      cursus posuere nisi. Cras fermentum suscipit nisl, vel
                      egestas nulla dapibus non. Aliquam diam orci, lobortis
                      sed metus vitae, rutrum condimentum sem.
                    </p>
                    <h5>Reply</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- post 4 -->

        </div>
        <!-- recent container ends -->
        <!-- trending container starts -->
        <div class="bi-trending-post-container">
          <h1>Trending Topics</h1>
          <ul class="bi-trending-posts-container">
            <li>
              <a href="#">
                <span>Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.</span>
                <span>82,654 Posted by this tag</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span>Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.</span>
                <span>82,654 Posted by this tag</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span>Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.</span>
                <span>82,654 Posted by this tag</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span>Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.</span>
                <span>82,654 Posted by this tag</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span>Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.</span>
                <span>82,654 Posted by this tag</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- trending container ends -->
      </div>
    </div>
    <!-- recent and trending post starts -->
  </main>
@endSection