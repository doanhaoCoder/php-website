<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>Send Mail</li>
        </ul>
    </div>
</section>
<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title" style="font-size: 130%;">
                Send Mail To All Subscribers
            </p>
        </header>

        <div class="card-content">
            <div id="msg">
                <!-- show thong bao  -->
            </div>
            <form role="form" method="Post" action="index.php?page=subscribers_add">
                <div class="field">
                    <label class="label">Subject</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="title" id="title" class="input" type="text" placeholder="Enter title">
                        </div>
                    </div>

                    <div>
                        <label>Content</label>
                        <textarea name="content" id="content"></textarea>
                    </div>
                    <button type="button" onclick="sendMail()" class="button medium blue --jb-modal">Submit</button>
                </div>
        </div>
        </form>
    </div>
    </div>
</section>