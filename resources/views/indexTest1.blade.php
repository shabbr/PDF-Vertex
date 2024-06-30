{{ isset($record->author_last_name) ? $record->author_last_name : '' }}
{{ isset($record->author) ? $record->author . ', ' : '' }}
{{ isset($record->editor) ? ' (' . $record->editor . ' ), ' : '' }}
{{ isset($record->title) ? $record->title . '. ' : '' }}

{{ isset($record->publish_date) ? $record->publish_date : '' }}
{{ isset($record->publish_date) ? '.' : '' }}

{{ isset($record->container) ? $record->container . ', ' : '' }}
{{ isset($record->volume) ? $record->volume : '' }}
{{ isset($record->number) ? '(' . $record->number . '), ' : '' }}
{{ isset($record->pages) ? $record->pages . '. ' : '' }}
{{ isset($record->publisher) ? $record->publisher . '. ' : '' }}
{{ isset($record->location) ? $record->location . ': ' : '' }}
{{ isset($record->institution) ? $record->institution . '. ' : '' }}
{{ isset($record->school) ? $record->school . '. ' : '' }}
{{ isset($record->content_type) ? '(' . $record->content_type . '). ' : '' }}
{{ isset($record->interviewer_last_name) ? $record->interviewer_last_name : '' }}
{{ isset($record->interviewer_first_name) ? $record->interviewer_first_name . '. ' : '' }}
{{ isset($record->url) ? 'Retrieved from ' . $record->url . '.' : '' }}
{{ isset($record->view_date) ? ' Accessed ' . $record->view_date . '.' : '' }}


