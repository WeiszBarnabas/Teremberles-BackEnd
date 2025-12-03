<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    protected $fillable = ['filled','document_types_id','forms_id'];

    /**
     * Get the documentType associated with the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function documentType(): HasOne
    {
        return $this->hasOne(DocumentTypes::class, 'id', 'document_types_id');
    }

}
