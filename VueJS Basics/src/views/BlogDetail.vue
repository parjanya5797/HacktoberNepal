<template>
<h2>{{post_detail.title}}</h2>
<div class="container">
  
<div class="cs-blog-detail">
    <div class="cs-main-post">
        <figure><img onload="pagespeed.CriticalImages.checkImageForCriticality(this);" data-pagespeed-url-hash="2714250504" alt="jobline-blog (8)" src="http://jobcareer.chimpgroup.com/jobdoor/wp-content/uploads/jobline-blog-8.jpg"></figure>
    </div>
    <div class="cs-post-title">
        <div class="cs-author">
            <figure>
                <a href="http://jobcareer.chimpgroup.com/jobdoor/user/jobcareer-admin/"><img width="32" height="32" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" data-pagespeed-url-hash="1229941675" class="avatar avatar-32 photo" srcset="http://1.gravatar.com/avatar/7a20fad302fc2dd4b4649dc5bdb3c463?s=64&amp;d=mm&amp;r=g 2x" src="http://1.gravatar.com/avatar/7a20fad302fc2dd4b4649dc5bdb3c463?s=32&amp;d=mm&amp;r=g" alt=""></a>
            </figure>
            <div class="cs-text">
                <a href="http://jobcareer.chimpgroup.com/jobdoor/user/jobcareer-admin/">Julia Andrason</a>
            </div>
        </div>
        <div class="post-option">
           
            <span class="post-date"><a href="http://jobcareer.chimpgroup.com/jobdoor/2015/11/"><i class="cs-color icon-calendar6"></i>Nov 23, 2015</a></span>
            <span class="post-comment"><a href="http://jobcareer.chimpgroup.com/jobdoor/experience-writing-for-producing-a-newscast/#comments"><i class="cs-color icon-chat6"></i>4 Comments</a></span>
        </div>
    </div>
    <div class="cs-post-option-panel">
        <div class="rich-editor-text">
            <p>{{post_detail.body}}</p>
            </div>
    </div>
    <div class="cs-tags">
        <div class="tags">
            <span>Tags</span>
            <ul>
                <li><a rel="tag" href="http://jobcareer.chimpgroup.com/jobdoor/tag/college/">College</a></li>
                <li><a rel="tag" href="http://jobcareer.chimpgroup.com/jobdoor/tag/job/">Job</a></li>
                <li><a rel="tag" href="http://jobcareer.chimpgroup.com/jobdoor/tag/search/">Search</a></li>
                <li><a rel="tag" href="http://jobcareer.chimpgroup.com/jobdoor/tag/teacher/">Teacher</a></li>
            </ul>
        </div>
      
    </div>
   
</div>
</div>
</template>

<script>
import axios from 'axios'
export default {
    name:"BlogDetail",
    props:{
        post_id:String
    },
    data(){
        return {
            post_detail:[]
        }
    },
    async created(){
        const res = await axios.get('https://jsonplaceholder.typicode.com/posts/'+this.post_id) ;
        this.post_detail = res.data;
    },
}
</script>


<style>

.cs-blog {
    margin-bottom: 30px;
}
.cs-blog h2 {
    font-size: 20px;
    letter-spacing: -1px;
    line-height: 29px;
    margin: 0 0 11px;
    position: relative;
    text-transform: uppercase;
}
.cs-blog::after {
    clear: both;
    content: "";
    display: block;
}
ul.blog-list {
    list-style: outside none none;
    margin: -30px 0 0;
    padding: 0;
    position: relative;
    width: 100%;
}
.blog-list.blog-slide {
    margin: 0;
}
.blog-list.blog-slider {
    margin: 0;
}
ul.blog-list li {
    float: left;
    list-style: outside none none;
    margin: 30px 0 0;
}
.blog-slide .slick-list {
    margin: 0 -15px;
}
ul.blog-list.blog-slide li {
    margin-bottom: 10px;
    margin-top: 0;
}
ul.blog-list li:first-child {
    border: 0 none;
}
ul.blog-list li figure {
    overflow: hidden;
    position: relative;
}
ul.blog-list li figure img {
    width: 100%;
}
ul.blog-list li .cs-text {
    border: 1px solid #f0f0f0;
    overflow: hidden;
    padding: 15px 20px;
}


.cs-blog-detail .cs-text .post-option {
    border-top: 1px solid #f0f0f0;
    float: left;
    padding-top: 10px;
    width: 100%;
}
.cs-blog-detail .cs-text .post-option span a {
    color: #777;
}
.widget ul.blog-list li .cs-text {
    height: auto;
    margin: 0;
    min-height: inherit;
    padding: 9px 0 13px;
}
ul.blog-list li .cs-text span {
    color: #8b919e;
    display: inline-block;
    font-size: 12px;
    line-height: 19px;
}
ul.blog-list li .cs-text p {
    margin-bottom: 12px;
}
ul.blog-list li .cs-text h5 {
    border-bottom: 1px solid #fff;
    font-size: 15px;
    margin: 0;
    min-height: 56px;
    padding: 0 0 5px;
}
ul.blog-list li .cs-text h5 a {
    color: #292c33;
}
ul.blog-list li .cs-text .readmore {
    float: right;
    font-size: 11px;
    line-height: 20px;
    padding-top: 6px;
    position: relative;
    text-transform: uppercase;
}
ul.blog-list .slick-list.draggable {
    overflow: hidden;
}
.cs-auther-name a {
    color: #999;
}
.blog-list .slick-arrow {
    background-color: #f9f9f9;
    float: left;
    height: 29px;
    margin: 5px 0 0 5px;
    text-align: center;
    width: 29px;
}
.blog-list .slick-arrow a {
    color: #999;
    font-size: 18px;
    line-height: 32px;
}
.cs-blog.classic {
    margin: 0 0 30px;
}
.cs-blog.classic ul {
    margin: 0;
}
.cs-blog.classic li {
    border-top: 2px solid #eceef0;
    float: left;
    list-style: outside none none;
    padding: 16px 0;
    width: 100%;
}
.cs-blog.classic p {
    display: inline-block;
    font-size: 16px;
    font-weight: 500;
    margin: 0 -4px 0 0;
    vertical-align: middle;
    width: 100%;
}
.cs-blog.classic p i {
    color: #c4c6c8;
    margin: 0 10px 0 0;
    vertical-align: middle;
}
.cs-blog.classic span {
    display: inline-block;
    float: none;
    font-size: 12px;
    text-align: right;
    vertical-align: middle;
}
.cs-blog.classic span i {
    color: #e2e5e8;
    float: right;
    font-size: 24px;
    margin: 2px 0 0 10px;
}
.cs-pagination-blog {
    margin-bottom: 30px;
}
.cs-blog.blog-medium {
    border-bottom: 0 none;
    margin: 0;
    padding-bottom: 30px;
}
.cs-blog.blog-medium::after {
    clear: both;
    content: "";
    display: block;
}
.cs-blog.blog-medium .blog-text .cs-post-title {
    clear: both;
}
.cs-blog .cs-media figure {
    position: relative;
}
.cs-blog .cs-media figure figcaption {
    background-color: rgba(0, 0, 0, 0.5);
    height: 100%;
    left: 0;
    opacity: 0;
    position: absolute;
    top: 0;
    transition: all 0.3s ease-in-out 0s;
    visibility: hidden;
    width: 100%;
}
.cs-blog .cs-media:hover figure figcaption {
    opacity: 1;
    visibility: visible;
}
.cs-blog.blog-medium .post-title h3 {
    margin-bottom: 0;
}
.cs-blog .post-title {
    margin-bottom: 10px;
}
.cs-blog.blog-medium .cs-media figure figcaption .cs-readmore a {
    color: #fff;
    font-size: 24px;
    left: 50%;
    margin: -10px 0 0 -65px;
    position: absolute;
    top: 50%;
    transform: scale(0.7);
}
.cs-blog.blog-medium .cs-media:hover figure figcaption .cs-readmore a {
    transform: scale(1);
}
.cs-blog.blog-medium:last-child {
    border-bottom: medium none;
    padding-bottom: 40px;
}
.blog-medium .cs-media {
    display: inline-block;
    margin-right: 30px;
    vertical-align: middle;
    width: 37%;
}
.blog-modern .cs-media {
    display: inline-block;
    margin-right: -4px;
    vertical-align: middle;
    width: 48.6%;
}
.blog-medium .cs-media figure img, .blog-modern .cs-media img {
    width: 100%;
}
.blog-medium .cs-media ~ .blog-text {
    display: inline-block;
    float: none;
    margin-right: 0;
    vertical-align: middle;
    width: 58%;
}
.blog-modern .blog-text {
    display: inline-block;
    margin-right: -4px;
    padding-left: 30px;
    vertical-align: middle;
    width: 51.4%;
}
.blog-modern .blog-text .cs-post-title {
    margin-bottom: 5px;
    padding-bottom: 1px;
    position: relative;
}
.blog-modern .blog-text .cs-post-title::after {
    bottom: 1px;
    content: "";
    height: 1px;
    left: 0;
    position: absolute;
    width: 27px;
}
.blog-modern .blog-text .blog-separator {
    margin: 0 0 10px;
}
.blog-modern .blog-text .blog-separator::before {
    display: none;
}
.blog-medium .blog-text {
    width: 99.1%;
}
.blog-medium .blog-text p {
    display: inline;
    margin: 0 0 15px;
}
.blog-medium .blog-separator {
    margin: 0 0 10px;
}
.cs-blog .cs-categories, .cs-blog-detail .cs-categories {
    display: block;
    margin: 0 0 12px;
}
.cs-blog .cs-categories a, .cs-blog-detail .cs-categories a {
    border-bottom: 2px solid #ededed;
    color: #55a747;
    display: inline-block;
    font-size: 10px;
    margin-right: 5px;
    padding-bottom: 2px;
    text-transform: uppercase;
}
.cs-blog-detail .post-option {
    float: right;
}
.cs-blog .post-option span a, .cs-blog-detail .post-option span a {
    color: #999 !important;
    display: inline-block;
    font-size: 12px;
    margin-right: 18px;
    vertical-align: middle;
}
.cs-blog .post-option span i, .cs-blog-detail .post-option span i {
    display: inline-block;
    font-size: 14px;
    margin-right: 10px;
    vertical-align: middle;
}
.cs-blog-detail .post-option span.post-category i {
    margin: 0;
}
.cs-blog-detail .post-option .post-category a {
    margin-left: 10px;
    margin-right: 0;
}
.cs-blog-detail .post-option .post-date {
    margin-left: 18px;
}
.cs-blog-detail .cs-text .post-option span i {
    float: left;
    margin: 3px 8px 0 0;
}
.cs-blog.blog-grid figure img {
    width: 100%;
}
.cs-blog.blog-grid .cs-media ~ .blog-text {
    margin: -30px 0 0;
    padding: 0 10px;
    position: relative;
    z-index: 1;
}
.cs-blog.blog-grid .cs-inner-bolg {
    background-color: #fff;
    display: inline-block;
    padding: 20px 25px;
    width: 100%;
}
.cs-blog.blog-grid .blog-text p {
    margin: 0 0 5px;
}
.cs-blog.blog-grid .post-option {
    line-height: normal;
    margin: 0 0 10px;
}
.cs-blog.blog-grid .post-option span {
    color: #8b919e;
    font-size: 10px;
    margin: 0 15px 0 0;
    position: relative;
    text-transform: uppercase;
}
.cs-blog.blog-grid .post-option span::before {
    background-color: #8b919e;
    border-radius: 100%;
    content: "";
    height: 3px;
    left: -10px;
    position: absolute;
    top: 5px;
    width: 3px;
}
.cs-blog.blog-grid .post-option span:last-child {
    margin: 0;
}
.cs-blog.blog-grid .post-option span:first-child::before {
    display: none;
}
.cs-blog.blog-grid .read-more {
    display: inline-block;
    font-size: 12px;
    position: relative;
}
.cs-blog.blog-grid .read-more::before {
    content: "";
    font-family: "icomoon";
    font-size: 14px;
    position: absolute;
    right: -15px;
    top: 0;
}
.blog-large .cs-media img {
    width: 100%;
}
.blog-large .cs-text {
    margin: 0 0 20px;
    position: relative;
    z-index: 1;
}
.blog-large .cs-media ~ .cs-text {
    background-color: #fff;
    margin: 0 auto;
    padding: 30px 0 0;
    width: 100%;
}
.cs-blog .cs-author, .cs-blog-detail .cs-author {
    float: left;
    margin: 0 0 10px;
}
.cs-blog .cs-author figure, .cs-blog-detail .cs-author figure {
    display: inline-block;
    height: 32px;
    margin: 0 10px 0 0;
    vertical-align: middle;
    width: 32px;
}
.cs-blog .cs-author figure img, .cs-blog-detail .cs-author figure img {
    border-radius: 100%;
}
.cs-blog .cs-author .cs-text, .cs-blog-detail .cs-author .cs-text {
    display: inline-block;
    margin: 0;
    padding: 0;
    vertical-align: middle;
}
.cs-blog .cs-author .cs-text a, .cs-blog-detail .cs-author .cs-text a {
    color: #555;
    font-size: 13px;
}
.blog-large .post-option, .cs-blog.blog-medium .post-option {
    float: right;
}
.cs-blog.blog-large .post-option span i, .cs-blog.blog-medium .post-option span i {
    color: #cfcfcf;
}
.post-option span i {
    margin-right: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.blog-separator {
    border-bottom: 1px solid #f1f1f1;
    display: inline-block;
    margin: 20px 0 25px;
    position: relative;
    width: 100%;
}
.blog-large .cs-text p {
    margin: 0 0 25px;
}
.blog-large .read-more {
    border: 1px solid;
    border-radius: 20px;
    display: inline-block;
    font-size: 12px;
    padding: 4px 20px;
    text-transform: uppercase;
}
.blog-large .cs-post-title {
    margin: 0 0 15px;
}
.blog-large .cs-post-title h3 {
    margin: 0;
}

.cs-blog-detail .cs-post-title h1 {
    margin: 0 0 10px;
}
.cs-blog-detail .cs-post-title::after {
    clear: both;
    content: "";
    display: block;
}
.cs-blog-detail .cs-main-post img {
    width: 100%;
}
.cs-blog-detail .cs-main-post {
    margin-bottom: 25px;
}
.cs-blog-detail .cs-admin-post .cs-media figure, .cs-blog-detail .cs-admin-post .cs-media figure img {
    border-radius: 100%;
}
.cs-blog-detail .cs-admin-post .cs-text {
    overflow: hidden;
}
.cs-blog-detail .cs-admin-post {
    float: left;
    width: 40%;
}
.cs-blog-detail .cs-admin-post .cs-media {
    float: left;
    height: 46px;
    margin-right: 14px;
    width: 46px;
}
.cs-blog-detail .cs-author-name {
    color: #ccc;
    display: inline-block;
    font-size: 14px;
    margin-right: 20px;
    padding-top: 6px;
    vertical-align: middle;
}
.cs-blog-detail .cs-author-name strong {
    color: #55a747;
    display: block;
    line-height: 26px;
}
.cs-blog-detail .cs-more-post {
    border: 1px solid #e4e4e4;
    border-radius: 3px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    color: #ccc;
    font-size: 11px;
    padding: 6px 8px;
}
.cs-blog-detail .cs-social-share {
    float: right;
}
.cs-blog-detail .cs-social-media {
    display: inline-block;
    margin: 0;
    padding: 0;
}
.cs-blog-detail .cs-social-media li {
    display: inline-block;
    list-style: outside none none;
    margin: 0;
    vertical-align: top;
}
.cs-blog-detail .cs-social-media li a {
    background-color: #fc6d4c;
    border-radius: 50%;
    color: #fff;
    display: block;
    font-size: 13px;
    height: 28px;
    line-height: 30px;
    margin: 0 5px 5px 0;
    text-align: center;
    width: 28px;
}
.cs-blog-detail .cs-social-media li a.cs-more {
    line-height: 33px;
    padding: 0;
}
.cs-blog-detail .cs-social-media li a::before {
    display: none;
}
.cs-blog-detail .cs-social-media li a[data-original-title="facebook"] {
    background-color: #2b4a8b;
}
.cs-blog-detail .cs-social-media li a[data-original-title="Facebook"] {
    background-color: #2b4a8b;
}
.cs-blog-detail .cs-social-media li a[data-original-title="Tumblr"] {
    background-color: #32506d;
}
.cs-blog-detail .cs-social-media li a[data-original-title="tumblr"] {
    background-color: #32506d;
}
.cs-blog-detail .cs-social-media li a[data-original-title="Dribbble"] {
    background-color: #ea4c89;
}
.cs-blog-detail .cs-social-media li a[data-original-title="dribbble"] {
    background-color: #ea4c89;
}
.cs-blog-detail .cs-social-media li a[data-original-title="stumbleupon"] {
    background-color: #eb4823;
}
.cs-blog-detail .cs-social-media li a[data-original-title="Stumbleupon"] {
    background-color: #eb4823;
}
.cs-blog-detail .cs-social-media li a[data-original-title="rss"] {
    background-color: #f06c19;
}
.cs-blog-detail .cs-social-media li a[data-original-title="twitter"] {
    background-color: #1f94d9;
}
.cs-blog-detail .cs-social-media li a[data-original-title="linkedin"] {
    background-color: #10598c;
}
.cs-blog-detail .cs-social-media li a[data-original-title="google"] {
    background-color: #d83936;
}
.cs-blog-detail .cs-social-media li a[data-original-title="youtube"] {
    background-color: #b00;
}
.cs-blog-detail .cs-social-media li a[data-original-title="Youtube"] {
    background-color: #b00;
}
.cs-blog-detail .cs-social-media li a.cs-more .at4-icon {
    border-radius: 10px;
    margin: 5px 0 0 -2px;
}
.cs-blog-detail .cs-share {
    float: none;
    left: 0;
    margin: 0 15px 0 0;
    position: absolute;
    top: 0;
}
.cs-blog-detail .cs-share a {
    color: #333;
    font-size: 18px;
    font-weight: 700;
}
.cs-blog-detail .cs-share-detail::after {
    clear: both;
    content: "";
    display: block;
}
.cs-blog-detail .cs-share-detail {
    display: inline-block;
    margin-bottom: 0;
    padding-bottom: 0;
    position: relative;
    vertical-align: middle;
    width: 49%;
}
.cs-blog-detail .cs-post-option-panel {
    float: left;
    padding-top: 20px;
    width: 100%;
}
.cs-blog-detail .rich-editor-text p {
    margin-bottom: 30px;
}
blockquote, .rich-text-editor blockquote {
    border-left: 4px solid;
    margin: 0 0 40px;
    padding: 20px 0 0;
    position: relative;
    width: 95%;
}
blockquote {
    background-color: #fcfcfc;
    font-style: italic;
    padding: 15px 40px 20px 50px !important;
}
blockquote, blockquote span, blockquote p {
    color: #777;
    display: block;
    font-size: 16px;
    line-height: 24px;
    margin-bottom: 15px;
}
blockquote .author-name a {
    color: #999;
    font-size: 11px;
}
blockquote.text-left-align {
    text-align: left;
}
blockquote.text-right-align {
    text-align: right;
}
blockquote.text-center-align {
    text-align: center;
}
blockquote::before, .rich-text-editor blockquote::before {
    color: #eaeaea;
    content: "";
    font-family: "icomoon";
    font-size: 22px;
    font-style: normal;
    left: 24px;
    position: absolute;
    top: 15px;
    transform: scale(-1);
}
.rich-text-editor blockquote {
    background-color: #fcfcfc;
    font-style: italic;
    padding: 15px 40px 20px 50px;
}
.rich-text-editor blockquote p {
    margin: 0;
}
blockquote > span {
    margin: 0;
    position: relative;
}
blockquote > span.author-name::after {
    display: none;
}
blockquote > span::after {
    color: #eaeaea;
    content: "";
    display: inline-block;
    font-family: "icomoon";
    font-size: 22px;
    font-style: normal;
    margin: 0 0 0 8px;
    position: relative;
    top: 3px;
}
.cs-blog-detail .tags {
    display: inline-block;
    margin: 0 -4px 0 0;
    vertical-align: middle;
    width: 50%;
}
.cs-blog-detail .cs-tags {
    display: block;
    margin: 0 0 40px;
}
.cs-blog-detail .cs-tags .tags span {
    color: #333;
    display: inline-block;
    font-size: 18px;
    margin: 0 10px 5px 0;
}
.cs-blog-detail .cs-tags .tags ul {
    display: inline-block;
    margin: 0;
    padding: 0;
}
.cs-tags ul li {
    display: inline-block;
    list-style: outside none none;
    margin: 0 0 6px;
}
.cs-tags ul li a {
    display: block;
    font-size: 12px;
    margin: 0 8px 0 0;
}
.cs-tags .tags ul li a {
    background-color: #f5f5f5;
    border-radius: 20px;
    color: #777;
    padding: 2px 18px 3px;
}
.comment-respond {
    margin-bottom: 30px;
}
.comment-form ul {
    list-style: outside none none;
}
.comment-form ul li {
    margin-bottom: 30px;
}
.comment-form .cs-element-title h3 {
    margin: 0;
}
.comment-form form .input-holder {
    position: relative;
}
.comment-form form .input-holder i {
    color: #cecece;
    font-size: 18px;
    position: absolute;
    right: 20px;
    top: 15px;
}
.comment-form form .input-holder input[type="text"], .comment-form form .input-holder textarea {
    border: 1px solid #e4e4e4;
    color: #999;
    font-size: 14px;
    height: 50px;
    margin-bottom: -1px;
    padding: 10px 20px;
    width: 100%;
}
.comment-form form .input-holder textarea {
    height: 214px;
    margin: 0 0 20px;
}
.comment-form form input[type="submit"] {
    background-color: #55a747;
    color: #fff;
    display: inline-block;
    font-size: 16px;
    padding: 10px 30px;
    text-transform: uppercase;
}
.blog-detail {
    box-shadow: none;
}
.blog-detail .blog-list {
    float: left;
    margin-bottom: 30px;
    position: relative;
    width: 100%;
}
.blog-slider-next {
    display: inline-block;
    position: absolute;
    right: 0;
    top: 10px;
}
.blog-slider-prev {
    display: inline-block;
    position: absolute;
    right: 20px;
    top: 10px;
}
.blog-detail::after, .author-detail::after, #comment ul li::after, .blog-detail .blog-list::after, .cs-packeges::after {
    clear: both;
    content: "";
    display: block;
}
.blog-title {
    margin-bottom: 25px;
}
.blog-title h3 {
    color: #282828;
    letter-spacing: -1px;
    line-height: 34px;
    margin: 0 0 10px;
}
.blog-detail .main-post {
    margin: 0 0 25px;
}
.blog-detail .main-post img {
    width: 100%;
}
.author-detail {
    border-bottom: 1px solid #f5f5f5;
    margin-bottom: 10px;
    padding-bottom: 22px;
}
.cs-admin figure {
    float: left;
    margin-right: 15px;
}
.cs-admin .cs-text {
    display: inline-block;
    overflow: hidden;
    padding-top: 8px;
}
.cs-admin .cs-text span {
    color: #ccc;
    display: block;
    font-size: 13px;
    line-height: 16px;
}
.cs-admin .cs-text strong {
    color: #282828;
    font-size: 14px;
    line-height: 18px;
}
.blog-detail h2 {
    line-height: 29px;
    margin: 0 0 11px;
    position: relative;
    width: 91%;
}
.rich-editor-text p {
    clear: both;
    line-height: 24px;
    margin-bottom: 20px;
}
</style>
