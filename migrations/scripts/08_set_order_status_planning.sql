CREATE OR REPLACE FUNCTION set_order_status_planning()
    RETURNS TRIGGER AS $$
BEGIN
    NEW.status := 'planning';
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;