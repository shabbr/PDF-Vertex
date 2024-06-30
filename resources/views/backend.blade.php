<form action="" id="showForm" method="post">
    @csrf
    @isset($results)

        @foreach ($results as $result)
            <table>
                <!-- Contributors Section -->
                <tr>
                    <td colspan="3">
                        <h2>Contributors</h2>
                    </td>
                </tr>
                <!-- Webpage Author -->
                <tr id="webpageAuthor">
                    <td><label for="webpageAuthor">Webpage Author</label></td>
                    <td><input type="text" name="webpageAuthor[]" required></td>
                </tr>

                <!-- Editor -->
                <tr id="editor">
                    <td><label for="editor">Editor</label></td>
                    <td><input type="text" name="editor[]"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="button" class=" btn btn-primary"
                            id="webpageAuthorBtn">Add another
                            Webpage Author</button></td>
                    <td><button type="button" class="btn btn-primary"
                            id="editorBtn">Add
                            Editor</button>
                    </td>

                </tr>

                <!-- Page/Article Section -->
                <tr>
                    <td colspan="3">
                        <h2>Page/Article</h2>
                    </td>
                </tr>

                <!-- Title -->
                <tr>
                    <td><label for="title">Title of Article or Page</label></td>
                    <td colspan=""><input type="text" name="title"
                            value=" {{ $result['title'] }}" id="title" required>
                    </td>
                </tr>

                <!-- Type of Content -->
                <tr>
                    <td colspan=""><label for="contentType" colspan="">Type
                            of
                            Content</label></td>
                    <td colspan="" class="" id="ml">
                        <select name="contentType" id="contentType">
                            <option value="blog" colspan="">Blog</option>
                            <!-- Add other content types as needed -->
                        </select>
                    </td>
                </tr>

                <!-- Date Published -->
                <tr>
                    <td><label for="dateAccessed">Published Date</label></td>
                    <td colspan="">
                        <input type="number" name="publishedYear" id="publishedYear"
                            placeholder="YYYY">
                        <input type="number" name="publishedMonth"
                            id="publishedMonth" placeholder="MM">
                        <input type="number" name="publishedDay" id="publishedDay"
                            placeholder="DD">
                    </td>
                    <td></td>
                </tr>
                {{-- <tr>
                <td><label for="title">Container</label></td>
                <td colspan=""><input type="text" name="container"
                        value=" {{ $result['container'] }}" id="container"
                        required></td>
            </tr>
            <tr>
                <td><label for="title">Publisher</label></td>
                <td colspan=""><input type="text" name="Publisher"
                        value=" {{ $result['publisher'] }}" id="publisher"
                        required></td>
            </tr> --}}
                <!-- URL -->
                <tr>
                    <td><label for="url">URL</label></td>
                    <td colspan=""><input type="url" name="url"
                            value="{{ $result['link'] }}" id="url" required>
                    </td>
                </tr>

                <!-- Date Accessed/Viewed -->
                <tr>
                    <td><label for="dateAccessed">Date Accessed/Viewed</label></td>
                    <td colspan="">
                        <input type="number" name="accessedYear" id="accessedYear"
                            placeholder="YYYY">
                        <input type="number" name="accessedMonth" id="accessedMonth"
                            placeholder="MM">
                        <input type="number" name="accessedDay" id="accessedDay"
                            placeholder="DD">
                    </td>
                    <td></td>
                </tr>
            </table>
        @endforeach
        <!-- Submit Button -->
        <button type="submit" class="mt-3 btn btn-primary"
            colspan='2'>Submit</button>
    @endisset

</form>

