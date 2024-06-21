document.addEventListener('DOMContentLoaded', () => {
    fetchDiscussions();
});

function fetchDiscussions() {
    fetch('get_comment.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);

            const discussionsDiv = document.getElementById('discussions');
            discussionsDiv.innerHTML = '';

            data.forEach(discussion => {
                const discussionDiv = document.createElement('div');
                discussionDiv.classList.add('discussion');
                discussionDiv.innerHTML = `
                    <h2>標題: ${discussion.title}</h2>
                    <h3><strong>貼文者:</strong> ${discussion.post_name}</h3>
                    <h3>内容: ${discussion.content}</h3>
                    <button class="comment-button" onclick="toggleCommentInput(this)">留言</button>
                    <div class="comments" style="display:none;">
                        <input type="text" placeholder="留下評論" required>
                        <button type="button" onclick="submitComment('${discussion.title}', this)">提交</button>
                    </div>
                    <div class="existing-comments">
                        ${discussion.comments && discussion.comments.length > 0
                            ? discussion.comments.map(comment => `
                                <p>留言:${comment.com_content}</p>
                                <p><strong>留言者:</strong> ${comment.com_username}</p>
                            `).join('')
                            : '<p>暫無評論</p>'
                        }
                    </div>
                `;
                discussionsDiv.appendChild(discussionDiv);
            });
        })
        .catch(error => console.error('Error:', error));
}

function toggleCommentInput(button) {
    const commentDiv = button.nextElementSibling;
    commentDiv.style.display = commentDiv.style.display === 'block' ? 'none' : 'block';
}

function submitComment(title, button) {
    const commentInput = button.previousElementSibling;
    const comment = commentInput.value;

    fetch('add_comment.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ comment, title }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('評論成功');
                fetchDiscussions();
            } else {
                alert('評論失敗');
            }
        })
        .catch(error => console.error('Error:', error));
}
