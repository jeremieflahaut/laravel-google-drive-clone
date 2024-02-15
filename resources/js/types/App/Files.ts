type FileModel = {
    id: number;
    name: string;
    path: string | null;
    parent_id: number | null;
    is_folder: boolean;
    mime: string | null;
    size: number | null;
    owner: string;
    created_at: string | null;
    updated_at: string | null;
    created_by: number;
    updated_by: number;
    deleted_at: string | null;
};

export type {
    FileModel
}
