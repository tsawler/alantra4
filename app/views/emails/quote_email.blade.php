<p>The following request for a quotation came in from the website</p>

<p><strong>Company:</strong> {{ $company }}</p>
<p><strong>Contact name:</strong> {{ $users_name }}</p>
<p><strong>Contact email:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
<p><strong>Phone:</strong> {{ $phone }}</p>
<p><strong>Interested In:</strong> {{ $interested_in }}</p>
<p><strong>Date Needed:</strong> {{ $date_needed }}</p>
<p><strong>Message</strong>:
    <br>
    {{ $the_message }}
</p>

<p>
    Full details are available in the admin tool.
</p>
